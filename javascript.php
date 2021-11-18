<script type="text/javascript">
//	var age = parseInt(prompt("Quel age avez vous?"));
//	alert(typeof(age));

//	if(age <= 17){
//		alert("pas encore majeur");
//	}else if(age <= 49){
//		alert("majeur mais pas senior");
//		}else if(age <= 59){
//			alert("senior mais pas retraite");
//		}else if(age <= 120){
//			alert("retraite");
//		}else{
//			alert('Je ne connais pas cet age');
//		}
</script>

<script type="text/javascript">
	
	//var nbr1 = Number(prompt("Nombre 1"));
	//var nbr2 = Number(prompt("Nombre 2"));
	//var result = nbr1 + nbr2;
	//alert(result);

</script>

<script type="text/javascript">

	//var test = 'Test';
	//alert(test.length);
	//alert(test.toUpperCase());

</script>

<script type="text/javascript">
	
//var nom = prompt("Votre nom:");
//var array = ["Théophile", "Enzo", "Maxime"];
//array.push(nom);
//array.unshift(nom);
//alert(array);

</script>

<script type="text/javascript">
	
//	var cousinsString = 'Pauline Guillaume Clarisse',
//    cousinsArray = cousinsString.split(' ');

//alert(cousinsString);
//alert(cousinsArray);

//var cousinsString_2 = cousinsArray.join('ALLAH');

//alert(cousinsString_2);

</script>

<input id="text" type="text" size="60" value="Vous n'avez pas le focus !" />

<script>
    var text = document.getElementById('text');
  
    text.addEventListener('focus', function(e) {
        e.target.value = "Vous avez le focus !";
    });

    text.addEventListener('blur', function(e) {
        e.target.value = "Vous n'avez pas le focus !";
    });
</script>