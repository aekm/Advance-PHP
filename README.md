# PHP-MVC

THis is a very simple PHP MVC template. To use it create a directory in views and name it as your page name and create index.php in it.
for example for search page you can create directory (search) and in it create index.php.

# controller

to create MVC view for each view you create, you should create a php file in controllers and name it as your specefic directory in views.
for example for your search view you should create search.php in controllers directory and create a class with functions in it :

```php
<?php
class Search extends Controller{
  function __construct(){
    parent::__construct();
  }#all class should have construct function
  
  function your-favorite-name(){
    $test = $this->model->your-function-name-in-model_search();
    $data = ['name'=>$test];
    $this->view('search/index',$data);
    #your view will send and recieve data from here
  }
  
}
?>
```

# model

To connect model to controller you should create model_(your controller name) in model directory and create a class in it, for example:

```php
<?php
 class model_search extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    function search(){
      #your queries 
      
    }#to connect this function into search controller just type in specefic function $this->model->search();
    
 }
?>
```

# view

now you can recieve data from controller.just get data in your view page. 

```php
<?php
  $name = $data['name'];
?>#type this in your html file
```

