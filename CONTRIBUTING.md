# Contribution Guidelines

I work really hard to provide high-quality code, I really happy if you want to contribute to this project, but here is many things that you needs to be comply.

## Issues and pull-requests

I use GitHub only for mirroring this project, the main location is a Phabricator instance that set-up on my development machine, please use this for issue creation and pull request submission.
The registration is available via github, so you can easily create an account, and start contributing. (No, I do not send spam to your email. )

Phabricator location: [Link](http://project.zolli.hu)

## Coding Guideline

### Basic definitions

 * Indent with **4 space** instead of tabs. 
 * Where its possible use simple quotation mark ( ' ) to define strings.
 * File encoding **must be** UTF-8 without BOM.
 * PHP closing tag **must be** omitted when the file only contains PHP code.
 * Soft line length is 120 character, but no hard limitation on line length.

### Location of namespace definition
Namespace definition must be going to the same line as the php opening tag (usually this is the first line)
and the opening tag and the definition must be separated by **one space**.

Namespace naming must be match to [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md) standard.

```php
   <?php namespace Foo\Bar\Baz;
   
   ...
```

### PHP7 Declare statements
The `declare` statements immediately follows the opening tag / namespace definition, without blank line.
If multiple `declare` statement is used each going to own line. Definition group **must be** followed by a blank line.

```php
<?php namespace Foo\Bar;
declare(strict_types=1);

    class { ... }
```

### Class importing

#### Importing before PHP7

The use statements go after the namespace definition, all use statement going to new line
The trailing slashes **not** be included in the definition. This is **not expected** but
recommended to try grouping of these imports, like in the below example. Don't import
a class unless you use them.

If you use a class that in the same namespace as the another class, tha PHP not force you
to import this class, but in this standard require to these classes be **imported**

These rules apply to constant and function importing too.

```php
<?php namespace Foo\Bar

use Baz\Baz;
use Bar\ClassName;
use Bar\Hello;
use Foo\Bar\Module\BarModuleInterface;
use Another\ClassName;

/**
 * Documentation block...
 */

 ...
```

#### Importing after PHP7

The rules same as below, with some difference:

- Use the groupping when importing class from same namespace.
- Groups defined like functions or methods (Close bracket in the same line, end in new line).
- The group content is indented with one indentation (4 space)
- After the close bracket **must be** followed by an empty line.

```php
<?php namespace Foo\Bar

use Bar\ClassName;
use Bar\Hello;
use Baz\{
    Baz,
    ClassName,
    Hello
};

use Foo\Bar\Module\BarModuleInterface;
use Another\ClassName;

/**
 * Documentation block...
 */

 ...
```


### Class comments and Package definition

#### Class comments

The initial comment of the class going after the defined **use** statements. The structure of this
comment block is strict, each block in this comment separated with an empty line. The class 
comment and the class definition **not be** separated by an empty line.

The first block is the actual comment that describe the class functionality.

The second block is a single line comment which identifies the actual project.

The third block is the main information of the author(s) and package information, if the class
have more author, each author signature **must be** going to a new line.

The fourth block contains all meta information of the class, such as link, license, copyright,
since, etc...

Tha last, fifth block is optional, here you can specify tags for various tool behaviour,
like this example.

```php
...

/**
 * Hello class, that makes PHP able to say hello nicely
 *
 * BuildR PHP Framework
 *
 * @author <AUTHOR_FULL_NAME> <<AUTHOR_EMAIL>>
 * @package ExamplePackage
 * @subpackage SubPackageIfTheClassInASubPackage
 *
 * @copyright    Copyright 2015, <AUTHOR_FULL_NAME>.
 * @license      https://github.com/Zolli/BuildR/blob/master/LICENSE.md
 * @link         https://github.com/Zolli/BuildR
 *
 * @codeCoverageIgnore
 * @cosingStandardIgnore
 */
 class Hello {
 
 ...
```
#### Package definition

`@package` **must be** defined, but the `@subpackage` is only defined when tha class is in a sub-package.
`@package` is strict by class namespace. The package name is the last piece of the root namespace.

Example:
```
When the root namespace is: Buildr\ClassLoader
The @package is: ClassLoader
```

Sub-packages defined from the full namespace. To determine the sub-package trim down
the root namespace from the class namespace and the leftover part is the sub-package.

Example fot **@subpackage** definition:
```
When the class namespace is: BuildR\ClassLoader\Module
The @subpackage is: Module
```

The sub-package not only 1 level deep, when the sub-package names is more than 1 deep
each level separated by **one** '**\\**' (backslash) character.

### Class, traits and interface definition

Class, traits and interface names must be in **PascalCase** format, in the class
naming you should try to assign a name that fully describe its functionality. 

The trait and interface name **must be** include its type, like this:

```
ContainerAwareTrait
GreetingsInterface
RuleInterface
```

After the definition you must insert a blank line.

`implements` and `extends` keyword must be going to the same line as the class definition.

```php
...

/**
 * Documentation block...
 */
class HelloWorld extends World implements GreetingsInterface {

    public $message = 'Hello World';
...
```

### Property naming and comments

The properties name must be formatted with **camelCase** and all property
**must have** a valid docBlock. All property docBlock must contains at least
the type definition of the given property.
The definition **must be** defined with `@type` definition.

For compatibility purposes the class name defined with `@type` definition **must be**
include a trailing slash.

If You use any other, non-standard tag, include these tags first.

You are allowed to declare additional documentation of property, if you defined this must be
separated with a blank line.

```php
...

class Hello {

    /**
     * @type string
     */
    public $message = 'Hello World!';
    
    /**
     * Extended documentation for this property 
     *
     * @Wire
     * @type \buildr\Logger\LoggerInterface
     */
    public $logger;
..
```

### Constants and keywords

Keywords always be defined as *UPPERCASE* format. Same for constants
but spaces must be replaced with _ (underscore) character.

If a class has any constant is **must be** the first definition after the class body.

Constants **may** contains docBlock, but this is not required. Rules are the same as
the property definition.

```php
...

class Hello {

    /**
     * Extended documentation
     *
     * @type int
     */
    const HELLO_WORLD = 'Hello World!';
        
    public $boolean = TRUE;
    
    public $nullValue = NULL;
    
    ...

```

#### Method and function definition

Methods **must be** defined in **camelCase** format and the visibility definition is **must be** the first 
keyword, additional modifiers, like abstract, static, final going **after** the visibility definition.

Opening braces **must be** go to the same line as the function definition.

The method arguments **must be** defined in **camelCase** format.

Getters and setters always started with the proper **set**  or **get** world, following by the class
property that is returns or sets.

```php
    ...
    
    public function setWriteToOutput($writeToOutput = FALSE) {
        $this->writeToOutput = $writeToOutput;
    }
    
    public static final function () {...}
    ...
```

If the method ends with a return statement the returns must be separated with one blank line. If
your method only an if statement feel free to use short if syntax.

The methods documentation only includes a @return statement when its returns something, if the
method is return the current object itself **do not use $this**, use the FQCN instead.

If the method or function throws exception, the docBlock **must be** include this with a `@throws` tag.
`@throws` going to the last place of the docBlock and separated with an empty line.

Optionally you can specify an other custom tag, like `@see` in the last place after
everything `@return`, `@throws`, etc...

```php
...

    /**
     * Method documentation...
     *
     * @param \buildr\Logger\LoggerInterface $logger The logger
     *
     * @return \buildr\Logger\LoggerInterface
     */
    public function setLogger(LoggerInterface $logger) {
        $this->logger = $logger;
        
        return $this;
    }
    
    /**
     * Returns the current element is valid or not
     *
     * @return boolean 
     */
    public function isValid() {
        return ($this->outputValue === 'yes') ? TRUE : FALSE;
    }

    /**
     * Awesome documentation for this method
     *
     * @param string $value String value
     *
     * @return bool
     *
     * @throws \Some\Namespace\Exception\CustomException
     *
     * @see http://google.com
     * @since Version 2.0.1
     */
    public function methodThatMayThrowsAnException($value) {
        ...
    }

...
```

You can use single-line type definition when the IDE not able to correctly resolve a variable type.

```php
    ...
    
    public function testFunction() {
        /** @type $container \buildr\Container\ContainerInterface */
        $container = Application::getContainer();
    }
    
    ...
```

When a method have many arguments as the method definition exceeded the line length, arguments
must be break to new lines.

```php
...

    public function testFunction(
        ClassTypeHint $className,
        $argument,
        $anotherArgument
    ) {
        ...
    }
...
```

### Array syntax

Always us the short array syntax that introduced in PHP 5.3. The array element **must be** going 
to new line after the definition and each element **must be** going to a new line 
and **ends** with a ',' (comma).

```php
...

class Hello {

    $array = [
        'Hello', 
        'World',
    ];
```

### Function calls

When a function call with all arguments is longer then the 120 character line limit arguments must be 
broken down to separated lines with one indention from the start of the function call.
The method closing ')' **must be** going to the same line as the last argument.

```php
...

    $this->sayHello(
        $argument1,
        $argument2,
        $argument3,
        $argument4
    );

...
```

### If, else, elseif statements

The if body must be indented with on indention from the definition. Use `else if` instead of PHP 
short definition (`elseif`).

Opening braces **must be** going to the same line as the statement.

```php
...

    if($hello == 'world') {
        ...
    } else if($hello == $currentUser) {
        ...
    } else {
        ...
    }

...
```

### Switch statements

Switch statements open bracket must be going to the same line as definition. `case` **must be** 
indented with one indention from the main switch definition.

`break` and other execution breaking keywords must be indented the same level as the `case` body
and **must be** separated be one blank line.

```php
...

    switch($expression) {
        case 1:
            $x = 1;
            
            break;
        case 2:
        case 3:
        case 4:
            $x = 2;
            
            break;
        default:
            $x = 0;
            
            break;
    }

...
```

### While and do-while

Closing braces must be going to the same line as the definition, the body must be indented with
one indention from the definition. 

In a do-while block, tha while keyword condition **must not** be separated white spaces.

```php
...

    while($var) {
        ...
    }
    
    do {
    
    } while($condition === TRUE);

...
```

### For and Foreach

Closing braces must be going to the same line as the definition, the body must be indented with
one indention from the definition. 

In a for loop the three argument that separated with ';', the semicolon must be surrounded with spaces.

```php
...

    for($i = 0 ; $i < 10 ; $i++) {
        ...
    }
    
    foreach($value as $key => $value) {
        ...
    }

...
```

### Try, catch, finally block

Closing braces must be going to the same line as the definition, the body must be indented with
one indention from the definition. 

The `catch` argument **not be** separated with spaces from the `catch` keyword.

`finally` used like `else` separated by space from the `catch` closing bracket and the `finally`
opening bracket.

```php
...

    try {
        $this->functionThatMayDropException();
    } catch(InvalidArgumentException $e) {
        ...
    } catch(LogicException $e) {
        ...
    } finally {
        ...
    }

...
```

### Operators
All of the binary and ternary operators **must be** surrounded with spaces.

Includes:
 - Arithmetic
 - Assignment
 - Bitwise
 - Comparison
 - Logical
 - String
 - Array
 - Type

Excluded operators:
 - Logical `!` (NOT)
 - Error Control `@`
 - Execution operators
 - Incrementing/Decrementing

#### Note on Incrementing/Decrementing operators

These operators allows C-style pre- and post- increment and decrement, but increment
and decrement operators **must be** postponed to variables without any whitespace.
