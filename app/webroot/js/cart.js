/*
GMZ Cart @gbr
*/
$(document).ready(function() {

	add = $(".addToCart");
	rmv = $(".removeFromCart");
	cartList = $(".cartList");

	$(add).on('click', function(event) {

		$(".realcart").fadeIn("slow");

		event.preventDefault();
		id = $(this).closest("td").attr("class").split("-");
		id = id[1];
		qtd = $(".qtd-"+id+" input").val();
		
		$(this).removeClass("add").addClass("approve active").css({"opacity":".6","cursor":"default"}).text("Já adicionado").animate({width: "87px"});
		$(this).next().addClass("pid-"+id).show().animate({width: "10px"}); // show Remove button
		$(".qtd-"+id).css("display","inline");
		$(".qtd-"+id+" input").show().focus().select();
		getData(id);
		addItem(id,nome,valor,qtd);
		qtdField(id);
	});

	$(".qtd input").focusout(function() {
		if($(this).val() == "") {
			$(this).val("1").keyup();	
		}
	});

	$(rmv).on('click', function(event) {
		event.preventDefault();
		id = $(this).attr("alt");
		$(".realcart").find("tr#"+id).hide();
		$("table.cart .pid-"+id).find(rmv).hide();
		$(".pid-"+id).find(add).removeClass("approve active").addClass("add").css({"opacity":"1","cursor":"auto"}).text("Adicionar ao carrinho").css({width:"121px"});
		$(".qtd-"+id+" input").val("").fadeOut("fast");
	});

	function addItem(id,nome,valor,qtd) {
		$(".realcart").find("tr#"+id).show();	
	}

	function qtdField(id) {
		$(".qtd-"+id+" input").keyup(function(e){
  			var val = $(this).val();
  			$(".qtdField-"+id).val(val);
  		});

  		$(".qtdField-"+id).keyup(function(e){
  			var val = $(this).val();
  			$(".qtd-"+id+" input").val(val);
  		});
  	}

	function getData(id) {
		arr = $(".pid-"+id).find(add).attr("alt").split("|");
		nome = arr[2];
		valor = arr[1];
		descricao = arr[3];
	}


});