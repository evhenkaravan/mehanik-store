jQuery(function($){
  // add a new toggle element after the parent category anchor
  $( "<div class='woo-cat-toggle'></div>" ).insertAfter( "#secondary .widget_product_categories .product-categories > .cat-item.cat-parent > a" );
  // when the new toggle element is clicked, add/remove the class that controls visibility of children
  $( "#secondary .widget_product_categories .product-categories .woo-cat-toggle" ).click(function () {
    $(this).toggleClass("cat-popped");
  });
  // if the parent category is the current category or a parent of an active child, then show the children categories too
  $('#secondary .widget_product_categories .product-categories > .cat-item.cat-parent').each(function(){
    if($(this).is('.current-cat, .current-cat-parent')) {
      $(this).children('.woo-cat-toggle').toggleClass("cat-popped");
    }
  });
});