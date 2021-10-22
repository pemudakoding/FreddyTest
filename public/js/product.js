// Config
const currentUri = window.location.origin;
const csrf = document.querySelector('meta[name="csrf-token"]').content;

// ADD Product
const addProductModal = document.querySelector("#addModal");

addProductModal.addEventListener("show.bs.modal", function () {
    const saveProductBtn = this.querySelector(".save-product");
    const modal = this;

    saveProductBtn.onclick = async function () {
        const productForm = modal.querySelectorAll(".product-form");

        let productData = {};
        productForm.forEach((form) => {
            productData[form.name] = form.value;
        });

        const addProductRequest = await fetch(`${currentUri}/api/products`, {
            headers: {
                accept: "application/json",
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf,
            },
            method: "POST",
            body: JSON.stringify(productData),
        });

        const addProductResponse = await addProductRequest.json();

        try {
            if (addProductResponse.code === 200) {
                alert(addProductResponse.msg);
            }
        } catch (exception) {
            alert("Ada kesalahan Internal");
        }
        window.location.reload();
    };
});

// Edit Modal
const editProductModal = document.querySelector("#updateModal");
editProductModal.addEventListener("show.bs.modal", async function (e) {
    const relatedButton = e.relatedTarget;
    const modal = this;
    const productForm = modal.querySelectorAll(".product-form");
    const saveProductBtn = modal.querySelector(".save-product");

    const getProductRequest = await fetch(
        `${currentUri}/api/products/${relatedButton.dataset.product_id}`,
        {
            headers: {
                accept: "application/json",
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf,
            },
            method: "GET",
        }
    );

    const getProductResponse = await getProductRequest.json();
    productForm.forEach((form) => {
        form.value = getProductResponse.data[form.name];
    });

    saveProductBtn.onclick = async function () {
        let productData = {};
        productForm.forEach((form) => {
            productData[form.name] = form.value;
        });

        const updateProductRequest = await fetch(
            `${currentUri}/api/products/${relatedButton.dataset.product_id}`,
            {
                headers: {
                    accept: "application/json",
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrf,
                },
                method: "PUT",
                body: JSON.stringify(productData),
            }
        );

        const updateProductResponse = await updateProductRequest.json();

        try {
            if (updateProductResponse.code === 200) {
                alert(updateProductResponse.msg);
            }
        } catch (exception) {
            alert("Ada kesalahan Internal");
        }
        window.location.reload();
    };
});

// Destroy Data
const destroyButton = document.querySelectorAll(".delete-btn");
destroyButton.forEach((button) => {
    button.onclick = async function () {
        const destroyProductRequest = await fetch(
            `${currentUri}/api/products/${this.dataset.product_id}`,
            {
                headers: {
                    accept: "application/json",
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrf,
                },
                method: "DELETE",
            }
        );

        const destroyProductResponse = await destroyProductRequest.json();

        try {
            if (destroyProductResponse.code === 200) {
                alert(destroyProductResponse.msg);
            }
        } catch (exception) {
            alert("Ada kesalahan Internal");
        }
        window.location.reload();
    };
});
