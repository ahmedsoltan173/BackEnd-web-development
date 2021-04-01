
let id=$("input[name*='id']")
id.attr("readonly","readonly");
											//Update 
$(".btnedit").click( e=>{
	let textvalue =displayData(e);
	console.log(textvalue);

	
	let bookname=$("input[name*='book_name']");
	let bookpublisher=$("input[name*='book_publisher']");
	let bookprice=$("input[name*='book_price']");


	id.val(textvalue[0]);
	bookname.val(textvalue[1]);
	bookpublisher.val(textvalue[2]);
	bookprice.val(textvalue[3].replace('$',""));

});

function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for(const value of td){
		 if(value.dataset.id == e.target.dataset.id){
		 textvalues[id++]=value.textContent;
		 }
	}
	return textvalues;
}