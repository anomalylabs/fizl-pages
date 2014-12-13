Fizl Pages
==========

A simple markdown, file based, web site builder.

## How it works

Fizl Pages makes it easy to map URIs to markdown files. For example, when a user visits `/home`,
Fizl will render the content in the `home.md` file. 

## Folder Structure

All content goes inside the base folder called `content`. This can be changed in the configuration.
All pages go inside a `pages` folder. Error pages such as the `404` go in an `errors` folder.

    /content/
        pages/
            about.md
            blog/
                index.md 
                01-one.md // blog/one
                02-two.md
            home.md
        errors/
            404.md

## Sub-pages
You can create sub pages by putting your files within nested folders.

## Index Pages

Lets say a user visits `/about`. Fizl will first check if an `about.md` exists, if not it will try 
to find `about/index.md`.

## Page Content
 
Simply write your the page content in [markdown](http://daringfireball.net/projects/markdown/syntax) syntax. 
    
 
## Page Headers
 


    $pages = new Anomaly\FizlPages\Pages;

home.md



    $page = $pages->find('home');

    


    echo $page->title; // echoes Home
 
    echo $page->date;