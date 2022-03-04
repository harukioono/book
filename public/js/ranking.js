/*説明の表示と非表示の切り替え*/
function RankingA(){
ranking = document.getElementById("ranking");


if(ranking.style.visibility == ""){
    ranking.style.visibility = "hidden";
}


if(ranking.style.visibility == "visible"){
        ranking.style.visibility = "hidden";
   }else if(ranking.style.visibility == "hidden"){
        ranking.style.visibility = "visible";
    }
 
}


window.addEventListener('DOMContentLoaded', (loadevent) => {
    document.getElementById('ranking').addEventListener('change',RankingA);
});

function RankingB(){
ranking = document.getElementById("ranking");


ranking.style.visibility = "hidden";
   

}
window.addEventListener('DOMContentLoaded', (loadevent) => {
    document.getElementById('ranking').addEventListener('change',RankingA);
});