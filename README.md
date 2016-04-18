# Simple pagination generator


##View [Project](http://beso9595.github.io/simple-pagination-generator/)

```php
/*          Variables         */
$page         //Current page
$page_count   //Amount of pages
$page_tabs    //Amount of tabs: first page, dots, numbered pages, last page.
$page_show    //$page_tabs without first(or last) and dot pages.
$page_middle  //Amount of pages when have dots on both side
$pag          //String which concatenates all pagination tabs
$en           //Empty field which forbids html patameter 'disabled'
$dis          //Html patameter 'disabled' which makes button disabled
$dots         //View of hidden pages tab
$prev         //View of previous tab
$next         //View of next tab
$left         //Determains if $page is into first $page_show tabs from left
$right        //Same from right

/*          Comments            */
#"previous"    //Header of the section which generates 'preciuous' tab
#"middle"      //Header of the section which generates number and dot tabs
#"next"        //Header of the section which generates 'next' tab

/*          Statements           */
if($page_count <= $page_tabs){ ... }              //Checks if $page_count is enought to display all tabs
($page == 1) ? $dis : $en;                        //If current page is '1', 'prev' can't move to left
($page == 1) ? "" : getLink($page - 1);           //Because of previous explanation it mustn't have a link
(($i == $page) ? $dis : $en)                      //If current page is in process of creation
($page == $page_count) ? $dis : $en               //If current page is last, 'next' can't move to right
($page == $page_count) ? "" : getLink($page + 1); //Because of previous explanation it mustn't have a link


/*          Functions          */
string getLink(int $page);                                        //returns link concatenated with $page var
string getPageTab(string $link, string $visible, string $value);  //returns html string filled with parameters
string getPagination(int $page, int $page_count);                 //returns whole pagination html(div) string
```
