const products = [];

const categories = ["Elektronik", "Fashion", "Makanan"];

for (let i = 1; i <= 50; i++) {
    products.push({
        name: "Produk " + i,
        price: Math.floor(Math.random() * 150000),
        description: "Produk berkualitas terbaik nomor " + i,
        category: categories[i % 3],
        image: "https://via.placeholder.com/300"
    });
}

const productList = document.getElementById("productList");
const searchInput = document.getElementById("search");
const categoryFilter = document.getElementById("categoryFilter");
const priceFilter = document.getElementById("priceFilter");

function displayProducts(data) {
    productList.innerHTML = "";

    if (data.length === 0) {
        productList.innerHTML = `<p class="text-center">Produk tidak ditemukan 😢</p>`;
        return;
    }

    data.forEach(product => {
        productList.innerHTML += `
        <div class="col-md-3">
            <div class="card">
                <img src="${product.image}">
                <div class="card-body">
                    <h5>${product.name}</h5>
                    <p class="text-muted">${product.description}</p>
                    <p class="fw-bold text-primary">Rp ${product.price}</p>
                    <span class="badge bg-secondary">${product.category}</span>
                    <button class="btn btn-primary btn-detail">Lihat Detail</button>
                </div>
            </div>
        </div>
        `;
    });
}

function filterProducts() {
    let filtered = products;

    const searchValue = searchInput.value.toLowerCase();
    if (searchValue) {
        filtered = filtered.filter(p =>
            p.name.toLowerCase().includes(searchValue)
        );
    }

    if (categoryFilter.value) {
        filtered = filtered.filter(p =>
            p.category === categoryFilter.value
        );
    }

    if (priceFilter.value === "low") {
        filtered = filtered.filter(p => p.price < 50000);
    } else if (priceFilter.value === "mid") {
        filtered = filtered.filter(p => p.price >= 50000 && p.price <= 100000);
    } else if (priceFilter.value === "high") {
        filtered = filtered.filter(p => p.price > 100000);
    }

    displayProducts(filtered);
}

searchInput.addEventListener("input", filterProducts);
categoryFilter.addEventListener("change", filterProducts);
priceFilter.addEventListener("change", filterProducts);

displayProducts(products);