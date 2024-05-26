let orders = document.getElementsByClassName('order');

let added_orders = document.getElementById('make-order-list');
for (let i = 0; i < orders.length; i++) {
	let addbtns = orders[i].getElementsByClassName('make-order-btn');
	for (let j = 0; j < addbtns.length; j++) {
		addbtns[j].addEventListener('click', () => {
			let order = document.createElement('div');
			order.innerHTML = orders.item(i).outerHTML;			
			let button = order.getElementsByClassName('d-flex');
			button[0].innerHTML = `<button class="btn btn-primary rm-btn"><span class="bi-trash3-fill"></span></button>`;
			button[0].getElementsByClassName('rm-btn')[0].addEventListener('click', () => {
				order.remove();
			});
			added_orders.appendChild(order); 
		});
	}
}
