<?php
//força a todas as classes criadas irão seguir um padrão, no caso irão ter o metodo exceute
interface Logger
{
    public function execute($message);
}
// criação das classes que seguirão o padrão da interface 
class LogToDatabase implements Logger
{
    public function execute($message)
    {
        var_dump('log the message to a database :' . $message);
    }
}
// criação das classes que seguirão o padrão da interface 
class LogToFile implements Logger
{
    public function execute($message)
    {
        var_dump('log the message to a file :' . $message);
    }
}
class LogToErr
{
    public function execute($message)
    {
        var_dump('log the message to err :' . $message);
    }
}
// classe concreta principal propriamente dita
class ExampleInterface
{
    protected $logger;
    //aqui é o principal: o tipo da classe passada deverá ser do tipo da interface
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function show()
    {
        $user = 'Alexandre';
        $this->logger->execute($user);
    }
}
//caso haja alguma mudança de código a unica coisa quer irá mudar é a passagem do parametro da classe
//que será passada para o construtor e o metodo execute irá ser implementado pela sua propria classe
$controller = new ExampleInterface(new LogToDatabase);
//o metodo show no caso é apenas um metodo auxiliar
$controller->show();
echo gettype(new LogToErr), "\n";
echo gettype(new LogToFile), "\n";
echo gettype(new LogToDatabase), "\n";