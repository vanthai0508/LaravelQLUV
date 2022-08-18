<! doctype html>
<html>
<head>
   @include( 'partial.head' )
</head>
<body>
<div class = "container" >
   <header class = "row" >
       @include( 'partial.header' )
   </header>
   <div id = "main" class = "row" >
           @ output ( 'nội dung' )
   </div>
   <footer class = "row" >
       @ include ( 'include.footer' )
   </footer>
</div>
</body>
</html>