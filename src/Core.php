<?php
//基础核心库
class Core{
    //配置信息
    protected $conf = [
        //消息队列类型
        'mq' => 'RabbitMQ',
        //消息队列配置
    ];
    //帮助信息
    protected $helps = [
        "help" => "帮助",
        "sql" =>  "数据库服务",
    ];
    public function __construct(array $conf = []){
        $this->conf = array_merge($this->conf,$conf);
    }
    //自动加载
    public function autoload(string $class){
        $path = str_replace('\\', '/', $class).'.php';
        if(file_exists($path)){
            include $path;
        }else{
            //文件不存在就去帮助
            $this->help();
        }
    }
    //核心操作
    public function core($class,$act=""){
        //拼接类名
        $className = "\\lib\\".$class;
        //实例化类
        $server = new $className($this);
        //执行操作
        $server->$act();
    }
    //连接中间件
    public function connMQ(){

    }
    //获取消息
    public function getMessage(){

    }
    //销毁消息
    public function delMessage(){

    }
    //关闭连接
    public function closeConn(){

    }
    //帮助
    protected function help(){
        $help = "php run\r\n";
        //循环生成帮助
        foreach($this->helps as $k => $v) {
            $help .= "\t".$info.$k." ".$v."\r\n";
        }
        exit($help);
    }
}
?>