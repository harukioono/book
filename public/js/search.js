/*検索ボタンの表示と非表示の切り替え*/

function SearchButton_Click(){
    this.searchForm.booklist.focus();

    book = document.getElementById("sbox1");

	
    target = document.getElementById("sbtn1");
   if(book.value == ""){
    target.style.visibility = "hidden";
   }else if(book.value != ""){
    target.style.visibility = "visible";
   }

 }


window.addEventListener('DOMContentLoaded', (loadevent) => {
    document.getElementById('form1').addEventListener('change',SearchButton_Click);
});

/*
検索機能の説明の表示・非表示の切り替え
*/

function SearchA(){
    search = document.getElementById("search");
    
    if(search.style.visibility == ""){
    search.style.visibility = "hidden";
}


if(search.style.visibility == "visible"){
        search.style.visibility = "hidden";
   }else if(search.style.visibility == "hidden"){
        search.style.visibility = "visible";
    }
}

window.addEventListener('DOMContentLoaded', (loadevent) => {
    document.getElementById('search').addEventListener('change',SearchA);
});

function SearchB(){
search = document.getElementById("search");


search.style.visibility = "hidden";
   

}
window.addEventListener('DOMContentLoaded', (loadevent) => {
    document.getElementById('search').addEventListener('change',SearchA);
});