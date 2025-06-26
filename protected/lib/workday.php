<?php
class Workday
{
    //法定工作日
    protected static $defined_workday_list = [
//        '2015-12-12'
    ];
    //法定节假日
    public static $defined_holiday_list = [
 //       '2018-07-02','2018-08-06','2018-09-03'
    ];
    protected static $workday_list         = ['1', '2', '3', '4', '5','6','7'];
    
    /****
     *
     * 获取指定时间之后的N个连续工作日
     *
     * @param int  $num
     * @param null $time
     * @return array
     */
    public static function getNextWorkdays($num = 5, $time = null)
    {
        if ($time == null) {
            $time = \time();
        }
        $dates = [];
        for ($i = 0; $i < $num; $i++) {
            $time    = self::getNextWorkday($time);
            $dates[] = ['title' => self::getWeekName($time), 'date' => date('Y-m-d', $time)];
            $time += 86400;
        }
        return $dates;
    }
    /***
     *
     * 获取指定时间之后的下一个工作日
     *
     * @param $time
     * @return mixed
     */
    public static function getNextWorkday($time)
    {
        $date = date('Y-m-d', $time);
        $w    = strval(date('w', $time));
        if (!in_array($date, self::$defined_workday_list) && (!in_array($w, self::$workday_list) || in_array($date, self::$defined_holiday_list))) {
            $time = self::getNextWorkday($time + 86400);
        }
        return $time;
    }
    /***
     *
     * 显示周名称
     *
     * @param $time
     * @param $prefix
     * @return mixed
     */
    public static function getWeekName($time, $prefix = '周')
    {
        $map = [
            '0' => $prefix . '日',
            '1' => $prefix . '一',
            '2' => $prefix . '二',
            '3' => $prefix . '三',
            '4' => $prefix . '四',
            '5' => $prefix . '五',
            '6' => $prefix . '六'
        ];
        return $map[date('w', $time)];
    }
}
?>