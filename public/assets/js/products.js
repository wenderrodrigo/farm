$(document).ready(function() {




  $( "#pais" ).autocomplete({
    source :function( request, response ) {
      $.ajax({
         url: "/api/coutry/"+request.term,
         dataType: "json",
         data: {
            q: request.term
         },
         success: function( data ) {
           response($.map(data, function(item) {
                   return {
                       label : item.name+" ("+item.code+")",
                       value : item.id
                   };
             }));
         }
      });
     },
     select: function (event, ui) {
           $("#pais").val(ui.item.label);
           $("#number_pais").val(ui.item.value);
           return false;
     }
  });

  $( "#categoria" ).autocomplete({
    source :function( request, response ) {
      $.ajax({
         url: "/api/productCategory/"+request.term,
         dataType: "json",
         data: {
            q: request.term
         },
         success: function( data ) {
           response($.map(data, function(item) {
                   return {
                       label : item.name+" ("+item.code+")",
                       value : item.id
                   };
             }));
         }
      });
     },
     select: function (event, ui) {
           $("#categoria").val(ui.item.label);
           $("#categoriaHidden").val(ui.item.value);
           return false;
     }
  });

  
  $( "#fabricante" ).autocomplete({
    source :function( request, response ) {
      $.ajax({
         url: "/api/manufacturerProducts/"+request.term,
         dataType: "json",
         data: {
            q: request.term
         },
         success: function( data ) {
           response($.map(data, function(item) {
                   return {
                       label : item.name+" ("+item.code+")",
                       value : item.id
                   };
             }));
         }
      });
     },
     select: function (event, ui) {
           $("#fabricante").val(ui.item.label);
           $("#fabricanteHidden").val(ui.item.value);
           return false;
     }
  });
  
    // var availableTags = [
    //     "ActionScript",
    //     "AppleScript",
    //     "Asp",
    //     "BASIC",
    //     "C",
    //     "C++",
    //     "Clojure",
    //     "COBOL",
    //     "ColdFusion",
    //     "Erlang",
    //     "Fortran",
    //     "Groovy",
    //     "Haskell",
    //     "Java",
    //     "JavaScript",
    //     "Lisp",
    //     "Perl",
    //     "PHP",
    //     "Python",
    //     "Ruby",
    //     "Scala",
    //     "Scheme"
    //   ];
    //   $( "#fabricante" ).autocomplete({
    //     source: availableTags
    //   });

});