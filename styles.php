<script>
	let cooking_bottons = document.getElementsByClassName("cook-btn");

	for (let i = 0; i < cooking_bottons.length; i++)
	{
		button = cooking_bottons[i];
		button.addEventListener('click', () => {
			let status = <?$_GET['status']?>;
			if (+status > 1)
			{
				button.className = 'btn cook-btn confirmed-order';
				button.
			}
		});
	}
</script>