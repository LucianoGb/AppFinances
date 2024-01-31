<script
	type="module"
	src="https://gradio.s3-us-west-2.amazonaws.com/3.28.3/gradio.js"
></script>

<gradio-app src="https://dheiver-breast-cancer.hf.space"></gradio-app>
<!-- <iframe
	src="https://dheiver-breast-cancer.hf.space"
	frameborder="0"
	width="850"
	height="450"
></iframe> -->
<input type="text" id="teste" value="TESTE">
<button onclick="resultado()">Resultado</button>
<script>
    function resultado(){
        var a = document.getElementsByClassName('scroll-hide svelte-1pie7s6')[0].value 
        console.log(a)
    }

    
</script>
<?php
