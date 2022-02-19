/******/function SearchButton_Click(){
/******/    this.searchForm.booklist.focus();
/******/
/******/    book = document.getElementById("sbox1");
/******/
/******/	
/******/    target = document.getElementById("sbtn1");
/******/   if(book.value == ""){
/******/    target.style.visibility = "hidden";
/******/   }else if(book.value != ""){
/******/    target.style.visibility = "visible";
/******/   }
/******/
/******/ }
/******/
/******/
/******/window.addEventListener('DOMContentLoaded', (loadevent) => {
/******/    document.getElementById('form1').addEventListener('change',SearchButton_Click);
/******/});