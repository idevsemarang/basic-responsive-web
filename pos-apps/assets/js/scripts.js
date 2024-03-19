const rupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR"
    }).format(number).replace(",00", "");
}


function viewCategories() {
    var mHtml = ""
    $.each( categories, function( i, category ) {
        var flagActive = ""
        if(category.flagActive){
            flagActive = "active"
        }

        mHtml += "<div class='col-md-3 col-6 col-lg-2 list-categories cat-"+i+"'>"
        mHtml += "<div class='category-single my-1 "+flagActive+"' onclick='showByCategory("+i+")'>"
        mHtml += "<i class='"+category.icon+"'></i> <label>"+category.name+"</label>"
        mHtml += "</div>"
        mHtml += "</div>"
    });

    $(".section-categories").html(mHtml)
}


function viewProducts() {
    var mHtml = ""
    $.each( products, function( i, product ) {
        mHtml += "<div class='col-md-3 col-6 col-lg-3 list-products prod-cat-"+product.category.replaceAll(" ", "-")+"'>"
        mHtml += "<div class='single-product my-2'  data-bs-toggle='modal' data-bs-target='#modalBuy' onclick='setModalBuy("+product.code+")'>"
        mHtml += "<img src='"+product.image+"'>"
        mHtml += "<div class='product-label'>"
        mHtml += "<h6>"+product.name+"</h6>"
        mHtml += "<label>"+rupiah(product.price)+"</label><br>"
        mHtml += "<label>Stock <b>"+product.stock+"</b></label>"
        mHtml += "</div>"
        mHtml += "</div>"
        mHtml += "</div>"
    });

    $(".section-products").html(mHtml)
}


function getProductByCode(code) {
    return products.find(product => product.code == code);
}


function getProductHistoriesByCode(transcode) {
    return productHistories.find(ph => ph.transcode == transcode);
}


function setModalBuy(code)
{
    const product = getProductByCode(code)

    $(".modal-title").text(product.name)
    $("#input-code").val(product.code)
    $("#input-qty").val("")
}


function formatDateTime(currentTimestamp)
{
    const currentDate = new Date(currentTimestamp);
    var year = currentDate.getFullYear();
    var month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are zero-indexed, so we add 1
    var day = String(currentDate.getDate()).padStart(2, '0');
    var hours = String(currentDate.getHours()).padStart(2, '0');
    var minutes = String(currentDate.getMinutes()).padStart(2, '0');
    var seconds = String(currentDate.getSeconds()).padStart(2, '0');
    var formattedDateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

    return formattedDateTime
}


function addItem()
{
    const currentTimestamp = Date.now();                        
    const code = $("#input-code").val()
    const qty = $("#input-qty").val()
    const product = getProductByCode(code)
    // const totalPrice = qty*product.price
    const totalPrice = qty*(product.price-0.5*product.price)
    const currentStock = product.stock
    const stockRemain = currentStock - qty
    var formattedDateTime = formatDateTime(currentTimestamp)

    product.stock = stockRemain
    viewProducts()
    
    $(".modal").modal('hide')

    productHistories.push({
        transcode: currentTimestamp, 
        transdate: formattedDateTime, 
        code : code, 
        name : product.name, 
        qty : qty,
        price : totalPrice,
    })

    viewProductHistories()
}


function viewProductHistories()
{
    var countTotalPrice = 0
    var mHtml = ""
    $.each( productHistories, function( i, ph ) {
        mHtml += "<tr class='item-"+ph.transcode+"'>"
        mHtml += "<td>"+ph.name+"</td>" //<br><small>At "+ph.transdate+"</small></td>"
        mHtml += "<td>"+ph.qty+"</td>"
        mHtml += "<td>"+rupiah(ph.price)+"</td>"
        mHtml += "<td><button class='btn btn-sm btn-danger' title='Hapus item' onclick=removeItem("+ph.transcode+")> <i class='fa fa-trash'></i> </button></td>"
        mHtml += "</tr>"

        countTotalPrice += ph.price
    });
    $(".table-history tbody").html(mHtml)

    $(".subtotal-price").text("TOTAL "+rupiah(countTotalPrice))
}


function removeItem(transcode) 
{
    const ph = getProductHistoriesByCode(transcode)
    const index = productHistories.findIndex(ph => ph.transcode == transcode);

    if (index !== -1) {
        productHistories.splice(index, 1);
        viewProductHistories()

        const product = getProductByCode(ph.code)
        const currentStock = product.stock
        const stockRemain = parseInt(currentStock) + parseInt(ph.qty)

        product.stock = stockRemain

        viewProducts()
    } 
}


function showByCategory(index) 
{
    $(".list-categories > div").removeClass("active")
    $(".cat-"+index+" > div").addClass("active")

    if (categories[index].name == 'Semua') {
        $(".list-products").fadeIn()
    }else{
        $(".list-products").hide()
        $(".prod-cat-"+categories[index].name.replaceAll(" ", "-")).fadeIn()            
    }
    $(".text-label-category").text(categories[index].name)
}



