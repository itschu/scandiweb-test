const container = document.getElementById("switcher");
const select = document.getElementById("productType");
const sku = document.getElementById("sku");
const product_form = document.getElementById("product_form");
const error = document.getElementById("error");

(() => {
	const now = performance.now().toString(36) + Math.random().toString(36);
	sku.value = now;

	product_form.addEventListener("submit", async (e) => {
		e.preventDefault();

		if (sku.value == "") {
			return (error.innerText = "SKU value cannot be empty");
		}

		if (parseInt(document.getElementById("price")?.value) < 0) {
			return (error.innerText = "Price cannot be a negative value");
		}

		if (parseInt(document.getElementById("size")?.value) < 0) {
			return (error.innerText = "size cannot be a negative value");
		}

		if (parseInt(document.getElementById("weight")?.value) < 0) {
			return (error.innerText = "weight cannot be a negative value");
		}

		if (parseInt(document.getElementById("height")?.value) < 0) {
			return (error.innerText = "height cannot be a negative value");
		}

		if (parseInt(document.getElementById("width")?.value) < 0) {
			return (error.innerText = "width cannot be a negative value");
		}

		if (parseInt(document.getElementById("length")?.value) < 0) {
			return (error.innerText = "length cannot be a negative value");
		}

		const req = await fetch(
			`/scandiweb-test/api/check-sku/?sku=${sku.value}`
		);
		const res = await req.json();

		if (res) {
			return;
		}

		product_form.submit();
	});
})();

const changeSwitcher = () => {
	if (select.value == "DVD") {
		container.innerHTML = `
           <div id="DVD">
                 <div class="item">
                    <label class="label">Size (MB)</label>
                    <input type="number" name="size" id="size" class="input" required />
                </div>
                <p class="desc">*Please provide the product size</p>
           </div>
        `;
	} else if (select.value == "Book") {
		container.innerHTML = `
            <div id="Book">
                <div class="item">
                    <label class="label">Weight (KG)</label>
                    <input type="number" name="weight" id="weight" class="input" required />
                </div>
                <p class="desc">*Please provide the product weight</p>
            </div>
        `;
	} else if (select.value == "Furniture") {
		container.innerHTML = `
           <div id="Furniture">
                 <div class="item">
                    <label class="label">Height (CM)</label>
                    <input type="number" name="height" id="height" class="input" required />
                </div>

                <div class="item">
                    <label class="label">Width (CM)</label>
                    <input type="number" name="width" id="width" class="input" required />
                </div>

                <div class="item">
                    <label class="label">Length (CM)</label>
                    <input type="number" name="length" id="length" class="input" required />
                </div>
                <p class="desc">*Please provide the product dimensions</p>
           </div>
        `;
	}
};
