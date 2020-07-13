<?php
//https://medium.com/successivetech/s-o-l-i-d-the-first-5-principles-of-object-oriented-design-with-php-b6d2742c90d7
spl_autoload_register('myAutoloader');
function myAutoloader($className){
    include 'classes/' . $className . '.php';
}

//1-Single Responsibility: A Class should be responsible for a single task
//... this example was stupid, so I did my quick, short example. My class is doing only one thing.
$logger = new Logger();
$logger->createLog('First log.');
$logger->createLog('Second log.');

//2-Open-Close Principle: A Class should be open to extension and close to modification.
//With my words: let slave classes (instruments) work for master class (musician).
//with this principle, we can easily add a new instrument, but we don't need to change anything in the Musician class.

$musician = new Musician();
$guitar = new Guitar();
$piano = new Piano();
$saxophone = new Saxophone();
$musician->playInstrument($guitar);
$musician->playInstrument($piano);
$musician->playInstrument($saxophone);


//3-Liskov Substitution: A derived Class can be substituted at places where base Class is used.
//e.g. Two different Classes implementing an interface return different type of values(array, collection, list). Now we will be forced to put conditional statements to check what kind of value is returned from the method we called. If its an array do this, else, if its a collection do that and so on. This kind of checks won’t be necessary if we follow Liskov substitution principle and make sure that returned exception types (if any) and the values have uniform return types.
/*
The following are the conditions to avoid LSP violation.
1. Method signatures must match and accept equal no of the parameter as the base type
2. The return type of the method should match to a base type - if the parent is returning an array, the child should also return an array and for example, NOT a collection.
3. Exception types must match to a base class

If we have two simple classes A and B, Class B inherits class A. So as per the Liskov Substitution Principle wherever we use class A in our program we should be able to replace it with its subtype class B.

Class A {
    public function doSomething(){}
}

Class B extends A {

}

*/






//4-Interface Segregation: Don’t make FAT Interfaces. i.e. Classes don’t have to override extra agreements that are not needed for that Class simply because it is there in interface. Make a lot of small, simple interfaces, instead of one big monstrum interface.


interface IPrinter
{
  public function print(Document $d);
}
interface IScanner
{
  public function scan(Document $d);
}
interface IXerox
{
  public function xerox(Document $d);
}
class Document {
 // some attributes and methods
}
class AdvancePrinter implements IPrinter,IScanner,IXerox
{
  public function print(Document $d){
    echo "Print document";
  }
  public function scan(Document $d){
    echo "Sacn document";
  }
  public function xerox(Document $d){
    echo "Take xerox copy of document";
  }
}
class SimplePrinter implements IPrinter{
  public function print(Document $d){
    echo "Print document";
  }
}



//5-Dependency Inversion: Depend on abstractions, not on concretions. Not only high level Classes but low level Classes also depend on the abstractions in order to decouple the code.
/*
Dependency inversion is not = to Dependency Injection!!!



*/

interface ConnectionInterface {
  public function connect();
}

class DbConnection implements ConnectionInterface {
  public function connect(){
    //connect to db code goes here
  }
}

class PasswordReminder {

  private $dbConnection;

  public function __construct(ConnectionInterface $dbConnection){//Very simply put: use the ConnectionInterface  in your class's constructor, and do not use OtherClass DbConnection in the constuctor..
    $this->dbConnection = dbConnection;
  }
}





require 'myHtml.php';