<?php
class books_model extends Model
{
    public $table_name = 'mannabook_books';
    
    const CATE_NEWARRIVAL      = 1;
    const CATE_BROTHER_NI      = 2;
    const CATE_BROTHER_JIANG   = 3;
    const CATE_BROTHER_WANG    = 4;
    const CATE_GOSPEL          = 5;
    const CATE_OTHERS          = 6;
    public $rules = array
    (
        'book_name' => array
        (
            'is_required' => array(TRUE, '产品名称不能为空'),
            'max_length' => array(180, '产品名称不能超过180个字符'),
        ),
        
        'book_sn' => array
        (
            'max_length' => array(20, '产品货号不能超过20个字符'),
        ),
        'display_price' => array
        (
            'is_required' => array(TRUE, '展示售价不能为空'),
            'is_decimal' => array(TRUE, '展示售价格式不正确'),
        ),
                
    );
    
    public function set_limit($limit = null, $total)
    {
        if(is_array($limit))
        {
            $limit = $limit + array(1, 10, 10);
            foreach($limit as &$v) $v = (int)$v;
            $this->pager($limit[0], $limit[1], $limit[2], $total);
            return empty($this->page) ? '' : " LIMIT {$this->page['offset']},{$this->page['limit']}";
        }
        return $limit ? ' LIMIT '.$limit : '';
    }
    
    /**
     * 按条件查找商品
     */
    public function find_goods($conditions = array(), $limit = null)
    {
        $where = 'WHERE status = 1';
        $binds = array();
        if(!empty($conditions['cate']))
        {
            $where .= " AND (cate_id = :cate OR cate_id IN (SELECT cate_id FROM vf_products_cate WHERE parent_id = :cate))";
            $binds[':cate'] = $conditions['cate'];
        }
        
        if(!empty($conditions['newarrival']))
        {
            $where .= ' AND newarrival = 1';
        }
        if(!empty($conditions['recommend']))
        {
            $where .= ' AND recommend = 1';
        }
        if(!empty($conditions['bargain']))
        {
            $where .= ' AND bargain = 1';
        }
        if(!empty($conditions['minpri']))
        {
            $where .= ' AND display_price >= :minpri';
            $binds[':minpri'] = $conditions['minpri'];
        }
        if(!empty($conditions['maxpri']))
        {
            $where .= ' AND display_price <= :maxpri';
            $binds[':maxpri'] = $conditions['maxpri'];
        }
        if(isset($conditions['kw']) && $conditions['kw'] != '')
        {
            $conditions['kw'] = sql_escape($conditions['kw']);
            if($GLOBALS['products_fulltext_query'] == 1)
            {
                $where .= ' AND MATCH (products_name,meta_keywords) AGAINST (:kw IN BOOLEAN MODE)';
                $binds[':kw'] = $conditions['kw'];
            }
            else
            {
                $where .= ' AND (products_name LIKE :inskw OR LOCATE(:kw, meta_keywords))';
                $binds[':inskw'] = '%'.$conditions['kw'].'%';
                $binds[':kw'] = $conditions['kw'];
            }
            
        }
    /***
        if(!empty($conditions['att']))
        {
            $att = explode('@', urldecode($conditions['att']));
            $newatt = array();
            foreach($att as $v) if(!empty($v)) $newatt[substr($v, 0, strpos($v, '_'))] = substr($v, strpos($v, '_') + 1);
            $goods_attr_model = new goods_attr_model();
            $relax_atids = array();
            foreach($newatt as $k => $v)
            {
                if($gatids = $goods_attr_model->find_all(array('attr_id' => $k, 'value' => $v), null, 'goods_id')) 
                {
                    foreach($gatids as $v) $relax_atids[$k][] = $v['goods_id'];
                }
                else
                {
                    $relax_atids[$k] = array();
                }
            }
            sort($relax_atids);
            $strict_atids = mult_array_intersect($relax_atids);
            $strict_atids = $strict_atids === FALSE ? $relax_atids[0] : $strict_atids;
            $attr_ids = !empty($strict_atids) ? implode(',', $strict_atids) : 0;
            $where .= " AND goods_id IN ({$attr_ids})";
        }
    ***/
        
        $total = $this->query("SELECT COUNT(*) as count FROM {$this->table_name} {$where}", $binds);
        if($total[0]['count'] > 0)
        {
            $limit = $this->set_limit($limit, $total[0]['count']);
            if(isset($conditions['sort']))
            {
                $sort_map = array('seq ASC', 'display_price ASC', 'display_price DESC', 'created_date DESC', 'created_date ASC');
                $sort = isset($sort_map[$conditions['sort']]) ? $sort_map[$conditions['sort']] : $sort_map[0];
            }
            else
            {
                $sort = 'seq ASC';
            }
            $fields = 'products_id, cate_id, products_name, products_name_e, original_price, products_brief, products_brief_e, display_price, products_image';
            $sql = "SELECT {$fields} FROM {$this->table_name} {$where} ORDER BY {$sort} {$limit}";
            return $this->query($sql, $binds);
        }
        
        return null;
    }
    
    public function set_search_filters($conditions)
    {
        $filters = $binds = array();
        $where = 'WHERE status = 1';

        if($conditions['kw'])
        {
            $conditions['kw'] = sql_escape($conditions['kw']);
            if($GLOBALS['cfg']['goods_fulltext_query'] == 1)
            {
                $where .= ' AND MATCH (goods_name,meta_keywords) AGAINST (:kw IN BOOLEAN MODE)';
                $binds[':kw'] = $conditions['kw'];
            }
            else
            {
                $where .= ' AND (goods_name LIKE :inskw OR LOCATE(:kw, meta_keywords))';
                $binds[':inskw'] = '%'.$conditions['kw'].'%';
                $binds[':kw'] = $conditions['kw'];
            }
        }
        
        $sql = "SELECT cate_id, cate_name FROM {$GLOBALS['mysql']['MYSQL_DB_TABLE_PRE']}goods_cate
                WHERE cate_id in (SELECT cate_id FROM {$GLOBALS['mysql']['MYSQL_DB_TABLE_PRE']}goods {$where} GROUP BY cate_id)
                ORDER BY seq ASC
               ";
        $filters['cate'] = $this->query($sql, $binds);
        
        $sql = "SELECT brand_id, brand_name FROM {$GLOBALS['mysql']['MYSQL_DB_TABLE_PRE']}brand
                WHERE brand_id in (SELECT brand_id FROM {$GLOBALS['mysql']['MYSQL_DB_TABLE_PRE']}goods {$where} GROUP BY brand_id)
                ORDER BY seq ASC
               ";
        $filters['brand'] = $this->query($sql, $binds);
        
        if($conditions['cate'])
        {
            $filters['attr'] = vcache::instance()->goods_cate_attr_model('find_all', array(array('cate_id' => $conditions['cate'], 'filtrate' => 1), 'seq ASC'));
            if($filters['attr'])
            {
                $attarr = !empty($conditions['att']) ? explode('@', urldecode($conditions['att'])) : array();
                $newatt = array();
                foreach($attarr as $u)
                {
                    if(!empty($u)) $newatt[substr($u, 0, strpos($u, '_'))] = $u;          
                }
                $newattstr = !empty($newatt) ? implode('@', $newatt) : '';

                foreach($filters['attr'] as &$v)
                {
                    if(!empty($v['opts']))
                    {
                        $opts = json_decode($v['opts'], TRUE);
                        $v['opts'] = array();
                        foreach($opts as $k => $o)
                        {
                            $v['opts'][$k]['name'] = $o . $v['uom'];
                            $v['opts'][$k]['att'] = urlencode($newattstr.'@'.$v['attr_id'].'_'.$o);
                            $v['opts'][$k]['checked'] = 0;
                            if(in_array($v['attr_id'].'_'.$o, $newatt)) $v['opts'][$k]['checked'] = 1;
                        }
                        $v['unlimit']['att'] = urlencode(implode('@', array_diff_key($newatt, array($v['attr_id'] => ''))));
                        $v['unlimit']['checked'] = isset($newatt[$v['attr_id']]) ? 0 : 1;
                    }
                    else
                    {
                        $v['opts'] = array();
                    }
                }
            }
        }

        //价格筛选
        $filters['price'] = array();
        $sql = "SELECT count(goods_id) AS count, min(now_price) AS min, max(now_price) AS max
                FROM {$GLOBALS['mysql']['MYSQL_DB_TABLE_PRE']}goods {$where}
               ";
        if($pri_query = $this->query($sql, $binds))
        {
            $pri_max_num = round($pri_query[0]['count'] / 10);
            if($pri_max_num >= 2)
            {
                if($pri_max_num >= 6) $pri_max_num = 6;
                $pri_incr = ceil(($pri_query[0]['max'] - $pri_query[0]['min']) / $pri_max_num);
                for ($i = 1; $i <= $pri_max_num; $i++)
                {
                    $l = $pri_incr * ($i - 1) + 1;
                    $r = $pri_incr * $i;
                    
                    if($i == 1) $min = 0; else $min = intval(str_pad(substr($l, 0, 2), strlen($l), 9, STR_PAD_RIGHT));
                    if($i == $pri_max_num)
                    {
                        $max = 0;
                        $str = $min.'以上';
                    }
                    else
                    {
                        $max = intval(str_pad(substr($r, 0, 2), strlen($r), 9, STR_PAD_RIGHT));
                        $str = $min.'-'.$max;
                    }
                    $filters['price'][] = array('min' => $min, 'max' => $max, 'str' => $str);
                }
            }
        }

        return $filters;
    }
    
    /**
     * 获取猜你喜欢的商品
     */
    public function get_guess_like($cookie = null)
    {
        if($cookie)
        {
            $ids = array();
            $history = array_slice(explode(',', $cookie), 0, 5);
            foreach($history as $k => $v) $ids[$k + 1] = (int)$v;
            $questionmarks = str_repeat('?,', count($ids) - 1) . '?';
            $related_model = new goods_related_model();
            $sql = "SELECT goods_id, goods_name, original_price, now_price, goods_image
                    FROM {$this->table_name}
                    WHERE status = 1 AND goods_id in (SELECT goods_id FROM {$related_model->table_name} WHERE related_id in ({$questionmarks}))
                    ORDER BY goods_id DESC
                   ";
            return $this->query($sql, $ids);
        }
        
        return null;
    }
    
    /**
     * 保存商品浏览历史 done!
     */
    public function set_history($products_id, $num = 20)
    {
        if($history = request('FOOTPRINT', null, 'cookie'))
        {
            $history = explode(',', $history);
            if(!in_array($products_id, $history))
            {
                array_unshift($history, $products_id);
                setcookie('FOOTPRINT', implode(',', array_slice($history, 0, $num)), $_SERVER['REQUEST_TIME'] + 604800, '/');
            }
        }
        else
        {
            setcookie('FOOTPRINT', $products_id, $_SERVER['REQUEST_TIME'] + 604800, '/');
        }
    }
    
    /**
     * 获取商品浏览历史 done!
     */
    public function get_history($limit = 10)
    {
        if($cookie = request('FOOTPRINT', null, 'cookie'))
        {
            $ids = array();
            $history = array_slice(explode(',', $cookie), 0, $GLOBALS['products_history_num']);
            foreach($history as $k => $v) $ids[$k + 1] = (int)$v;
            $marks = str_repeat('?,', count($ids) - 1) . '?';
            $sql = "SELECT products_id, products_name, products_name_e, original_price, display_price, products_image
                    FROM {$this->table_name}
                    WHERE products_id in ({$marks})
                   ";
            if(!empty($limit)) $sql .= " LIMIT {$limit}";
            return $this->query($sql, $ids);
        }
        return null;
    }

    /**
     * 获取购物车中商品数据 温鲜生
     */
    public function get_cart_items(array $items,$vip=0)
    {
        $cart_exception = new cart_exception_model();
        
        $ids = array();
        $i = 0;
        foreach($items as $v)
        {
            if(!in_array($v['id'], $ids)){$i += 1; $ids[$i] = (int)$v['id'];}
        }
        unset($i);
     
        if(empty($ids)) return FALSE;
        
//        $marks = str_repeat('?,', count($ids) - 1) . '?';
        $marks = "";
        foreach($ids as $id)
            $marks .= $id.",";
        $marks = rtrim($marks,",");

        $sql = "SELECT products_id, products_name, products_name_e, display_price, vip_price, products_image, stock_qty,gst,pst,bottle_deposit,bottle_deposit_rate,pickup_only,limit_delivery,limit_delivery_start,limit_delivery_end 
                FROM {$this->table_name} WHERE status = 1 AND products_id in ({$marks})";

        if($goods_map = $this->query($sql))
        {
            unset($ids, $marks);
            $goods_map = array_column($goods_map, null, 'products_id');
            $res['items'] = array();
            $res['display_amount'] = $res['amount'] = $res['qty'] = 0;
            $res['total_gst'] = $res['total_pst'] = $res['total_bottle_deposit'] = 0.00;
 /*           
            $res['vip_display_amount'] = $res['vip_amount'] = 0;
            $res['vip_total_gst'] = $res['vip_total_pst'] = 0.00;
 */
            foreach($items as $k => $v)
            {
                if(!isset($goods_map[$v['id']])) continue; 
                $type_price = $this->get_products_type_price((int)$v['id'], (int)$v['tid']); //get type prices and type_stock_qty
                $res['items'][$k] = $goods_map[$v['id']];
                $res['items'][$k]['type_id'] = (int)$v['tid'];
                $res['items'][$k]['type_name'] = $type_price['type_name'];
                $res['items'][$k]['display_price'] = $type_price['type_display_price'];
                $res['items'][$k]['vip_price'] = $type_price['type_vip_price'];
                $res['items'][$k]['type_stock_qty'] = $type_price['type_stock_qty'];
                
                $res['items'][$k]['display_price'] = sprintf('%1.2f', $res['items'][$k]['display_price']);
                
                $res['items'][$k]['qty'] = (int)$v['qty'] ? $v['qty'] : 1;
                if($vip==1 && $res['items'][$k]['vip_price'] > 0.00)
                {
                    $res['items'][$k]['subtotal'] = sprintf('%1.2f', $res['items'][$k]['vip_price'] * $res['items'][$k]['qty']);
                    
                    $res['items'][$k]['display_subtotal'] = sprintf('%1.2f', $res['items'][$k]['vip_price'] * $res['items'][$k]['qty']);
                }
                else
                {
                    $res['items'][$k]['subtotal'] = sprintf('%1.2f', $res['items'][$k]['display_price'] * $res['items'][$k]['qty']);
                    
                    $res['items'][$k]['display_subtotal'] = sprintf('%1.2f', $res['items'][$k]['display_price'] * $res['items'][$k]['qty']);
                }

                $res['items'][$k]['json'] = json_encode($v);
                
//调试用,监测购买数量大于库存的情况
if($res['items'][$k]['qty'] > $res['items'][$k]['type_stock_qty'])
{
   if(isset($_SESSION['USER']))
   {
       $user_id = $_SESSION['USER']['USER_ID'];
       $email = $_SESSION['USER']['EMAIL'];
   }
   else
   {
       $user_id = 0;
       $email = '';
   }
   $cart_data = array(
       'ip' => get_ip(),
       'user_id' => $user_id,
       'email' => $email,
       'products_id' => $res['items'][$k]['products_id'],
       'type_id' => $res['items'][$k]['type_id'],
       'order_qty' => $res['items'][$k]['qty'],
       'stock_qty' => $res['items'][$k]['type_stock_qty'],
       'description' => $res['items'][$k]['products_name']." 规格：".$res['items'][$k]['type_name'],
       'date_created' => date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']),
   ); 
    
   $cart_exception->create($cart_data);
}
                
                //tax
                if($goods_map[$v['id']]['gst'])
                {
                   $res['items'][$k]['gst_amount'] = sprintf('%1.2f',$res['items'][$k]['subtotal'] * $GLOBALS['gst_rate']);
                   $res['total_gst'] += $res['items'][$k]['gst_amount'];
                   
                }
                else
                {
                   $res['items'][$k]['gst_amount'] = 0.00;
                }
                
                if($goods_map[$v['id']]['pst'])
                {
                   $res['items'][$k]['pst_amount'] = sprintf('%1.2f',$res['items'][$k]['subtotal'] * $GLOBALS['pst_rate']);
                   $res['total_pst'] += $res['items'][$k]['pst_amount'];
                   
                }
                else
                {
                   $res['items'][$k]['pst_amount'] = 0.00;
                }
                
                if($goods_map[$v['id']]['bottle_deposit'])
                {
                   $res['items'][$k]['bd_amount'] = sprintf('%1.2f',$res['items'][$k]['qty'] * $goods_map[$v['id']]['bottle_deposit_rate']);
                   $res['total_bottle_deposit'] += $res['items'][$k]['bd_amount'];
                }
                else
                {
                   $res['items'][$k]['bd_amount'] = 0.00;
                }
                
                $res['amount'] += $res['items'][$k]['subtotal'];
                $res['display_amount'] += $res['items'][$k]['display_subtotal'];
                $res['qty'] += $res['items'][$k]['qty'];

            }
            $res['amount'] = sprintf('%1.2f', $res['amount']);
            $res['display_amount'] = sprintf('%1.2f', $res['display_amount']);
            $res['kinds'] = count($res['items']);
            $res['total_gst'] = sprintf('%1.2f', $res['total_gst']);
            $res['total_pst'] = sprintf('%1.2f', $res['total_pst']);
            $res['total_bottle_deposit'] = sprintf('%1.2f', $res['total_bottle_deposit']);
            
            $res['amount_include_tax'] = $res['amount'] + $res['total_gst'] + $res['total_pst'] + $res['total_bottle_deposit'];
            
            
            //只用检查普通会员价的总和是否低于送货最低金额
            if($res['amount'] < $GLOBALS['free_shipping_minimum'] )
                $res['shipping_fee'] = $GLOBALS['shipping_fee'];
            else
                $res['shipping_fee'] = 0;
            
            $res['amount_include_tax'] = sprintf('%1.2f', $res['amount_include_tax']);
            return $res;
        }
        return FALSE;
    }
    
    /***温鲜生***/
    public function get_products_type_price($products_id, $type_id)
    {
        if( $type_id == 0 )
        {
            $sql = "SELECT price_unit as type_name, display_price as type_display_price, cost_price as type_cost_price, original_price as type_original_price, vip_price as type_vip_price, stock_qty as type_stock_qty FROM {$this->table_name} WHERE products_id = {$products_id}";

        }
        else
        {
            $sql = "SELECT type_text as type_name, type_display_price, type_cost_price, type_original_price, type_display_price as type_vip_price, type_stock_qty FROM vanf_products_type WHERE products_id = {$products_id} AND id = {$type_id}";
         }
        
        $result = $this->query($sql);
        if($result)
            return $result[0];
        else
            return false;
    }
    
    //获取某一产品所有的规格
    //返回：规格列表： type_id, type_name, type_display_price, type_discount_price
    public function get_products_types($products_id,$merchant_id,$language=0)
    {
        if( $language == 0 )
        {
            $sql = "SELECT 0 as type_id, price_unit as type_name, display_price as type_display_price, display_price as type_discount_price, original_price as type_original_price, stock_qty as type_stock_qty FROM vf_products WHERE products_id = {$products_id}";
            $res = $this->query($sql);
            $sql = "SELECT id as type_id, type_text as type_name, type_display_price,type_display_price as type_discount_price, type_original_price,type_stock_qty FROM vf_products_type WHERE products_id ={$products_id}";
            if($rtypes = $this->query($sql))
                $results = array_merge($res,$rtypes);
            else
                $results = $res;
        }
        else
        {
            $sql = "SELECT 0 as type_id, price_unit_e as type_name, display_price as type_display_price, display_price as type_discount_price, original_price as type_original_price, stock_qty as type_stock_qty FROM vf_products WHERE products_id = {$products_id}";
            $res = $this->query($sql);
            $sql = "SELECT id as type_id, type_text_e as type_name, type_display_price,type_display_price as type_discount_price, type_original_price,type_stock_qty FROM vf_products_type WHERE products_id ={$products_id}";
            if($rtypes = $this->query($sql))
                $results = array_merge($res,$rtypes);
            else
                $results = $res;
        }
        
        $discount_model = new discount_price_model();
        foreach($results as &$v)
        {
            $v['type_discount_price'] = $discount_model->get_current_discount_price($merchant_id, $products_id,$v['type_display_price'],$v['type_id']);
        }
        
        return $results;
    }

    
    //取得产品是否冷冻
    public function get_FrozenStatus($products_id)
    {
        $result = $this->find(array('products_id' => $products_id),null,"frozen");
        if($result)
        {
           return $result['frozen']; 
        }
        else
            return 0;
    }
        
    /**
     * 获取相关联商品
     */
    public function get_related($products_id, $limit = 5)
    {
        $sql = "SELECT products_id, products_name, original_price, display_price, products_image
                FROM {$this->table_name}
                WHERE products_id in (SELECT products_id FROM vf_goods_related WHERE related_id = :products_id)
                ORDER BY products_id DESC LIMIT {$limit}
               "; 
        return $this->query($sql, array(':products_id' => $products_id));
    }
    
    /**
     * 商品销售排行
     */
    public function get_bestseller($cate_id = null, $limit = 10)
    {
        $where = "WHERE 1";
        if(!empty($cate_id)) $where .= " AND b.cate_id = {$cate_id}";
        $sql = "SELECT a.goods_id, COUNT(1) AS count, b.goods_name, b.now_price, b.goods_image
                FROM {$GLOBALS['mysql']['MYSQL_DB_TABLE_PRE']}order_goods AS a 
                LEFT JOIN {$this->table_name} AS b
                ON a.goods_id = b.goods_id
                {$where}
                GROUP BY a.goods_id
                ORDER BY COUNT(1) DESC
                LIMIT {$limit}
               ";
        return $this->query($sql);
        
    }
}
