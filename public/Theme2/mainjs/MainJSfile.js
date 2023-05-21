// tax module

function renderSubCat() {
  let mainCatId = $('#ultraCat').val();

  $.ajax({
    url: BASE_URL + "/subCatAjax?ultraCat="+mainCatId,
    success: function (data) {
      $("#subCatReplace").html(data);
      
    },
  });
}

// product main iamge preview
const PMainImage = document.getElementById("PMainImage");
const productImagePreview = document.getElementById("PpreviewMainImage");
PMainImage.addEventListener("change", function () {
  const productImageFIle = this.files[0];
  if (productImageFIle) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      productImagePreview.setAttribute("src", this.result);
    });
    reader.readAsDataURL(productImageFIle);
  }
});
// product 1
const pImage1 = document.getElementById("pImage1");
const preview1 = document.getElementById("preview1");
pImage1.addEventListener("change", function () {
  const productImageFIle = this.files[0];
  if (productImageFIle) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      preview1.setAttribute("src", this.result);
    });
    reader.readAsDataURL(productImageFIle);
  }
});
// product image 2
const pImage2 = document.getElementById("pImage2");
const preview2 = document.getElementById("preview2");
pImage2.addEventListener("change", function () {
  const productImageFIle = this.files[0];
  if (productImageFIle) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      preview2.setAttribute("src", this.result);
    });
    reader.readAsDataURL(productImageFIle);
  }
});
// product image 3
const pImage3 = document.getElementById("pImage3");
const preview3 = document.getElementById("preview3");
pImage3.addEventListener("change", function () {
  const productImageFIle = this.files[0];
  if (productImageFIle) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      preview3.setAttribute("src", this.result);
    });
    reader.readAsDataURL(productImageFIle);
  }
});
// product image 4
const pImage4 = document.getElementById("pImage4");
const preview4 = document.getElementById("preview4");
pImage4.addEventListener("change", function () {
  const productImageFIle = this.files[0];
  if (productImageFIle) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      preview4.setAttribute("src", this.result);
    });
    reader.readAsDataURL(productImageFIle);
  }
});