


// var forms= document.forms;
var forms= document.getElementsByClassName("addToCartForm");

for (var i = 0; i < forms.length; i++) {
  forms[i].onsubmit=addProduct;
}




function addProduct(e) {
  e.preventDefault();

  var data = new FormData(e.target);

  //start cart counter
  cartCounter=0;

  //start ajax request
  $.ajax({
    url: '/cart',
    type: "POST",
    timeout: 5000,
    data: data,
    contentType: false,
    cache: false,
    processData: false,
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //succes proceed to...
    success:function(data){

      //como pasa data de ser un request a un response?????!!!
      response= Object.values(data);


      console.log(response);


      response.forEach(function(element) {
        cartCounter += parseInt(element.quantity);
      });

        document.getElementById("cartCount").innerHTML = cartCounter;
      },
      //error execute
      error:function(){
        alert("error!!!!");
      }});
      e.stopPropagation();
    }
