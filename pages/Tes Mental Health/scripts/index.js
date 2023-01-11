var i = 0;
var countDepresi = 0;
var countCemas = 0;
var countStress = 0;


generate(0);

function generate(index) {
    document.getElementById("test").innerHTML = jsonData[index].q;
    document.getElementById("skorr0").innerHTML = jsonData[index].skor0;
    document.getElementById("skorr1").innerHTML = jsonData[index].skor1;
    document.getElementById("skorr2").innerHTML = jsonData[index].skor2;
    document.getElementById("skorr3").innerHTML = jsonData[index].skor3;
}

function countAnswer() {
    if (document.getElementById("skor1").checked && jsonData[i].skor1 && jsonData[i].category=="Depresi") {
        countDepresi+=2;
    }
    if (document.getElementById("skor2").checked && jsonData[i].skor2 && jsonData[i].category=="Depresi") {
        countDepresi+=4;
    }
    if (document.getElementById("skor3").checked && jsonData[i].skor3 && jsonData[i].category=="Depresi") {
        countDepresi+=6;
    }
    if (document.getElementById("skor1").checked && jsonData[i].skor1 && jsonData[i].category=="Cemas") {
        countCemas+=2;
    }
    if (document.getElementById("skor2").checked && jsonData[i].skor2 && jsonData[i].category=="Cemas") {
        countCemas+=4;
    }
    if (document.getElementById("skor3").checked && jsonData[i].skor3 && jsonData[i].category=="Cemas") {
        countCemas+=6;
    }
    if (document.getElementById("skor1").checked && jsonData[i].skor1 && jsonData[i].category=="Stress") {
        countStress+=2;
    }
    if (document.getElementById("skor2").checked && jsonData[i].skor2 && jsonData[i].category=="Stress") {
        countStress+=4;
    }
    if (document.getElementById("skor3").checked && jsonData[i].skor3 && jsonData[i].category=="Stress") {
        countStress+=6;
    }
    i++;
    if(jsonData.length-1 < i){
        document.getElementById("score-depresi").innerHTML = countDepresi;
        document.getElementById("score-cemas").innerHTML = countCemas;
        document.getElementById("score-stress").innerHTML = countStress;

        // Jika hasil "Normal"
        if(countDepresi >=2 && countDepresi <= 14 ){
            document.getElementById("score-stress").innerHTML = countDepresi + "<br> Normal (Tetap jaga kesehatan mental anda)";
        }
        if(countCemas >=2 && countCemas <= 14 ){
            document.getElementById("score-cemas").innerHTML = countCemas + "<br> Normal (Tetap jaga kesehatan mental anda)";
        }
        if(countStress >=2 && countStress <= 14 ){
            document.getElementById("score-depresi").innerHTML = countStress + "<br> Normal (Tetap jaga kesehatan mental anda)";
        }

        // Jika hasil "Ringan"
        if(countDepresi >=16 && countDepresi <= 18 ){
            document.getElementById("score-stress").innerHTML = countDepresi + "<br> Ringan (Tetap jaga kesehatan mental anda)";
        }
        if(countCemas >=16 && countCemas <= 18 ){
            document.getElementById("score-cemas").innerHTML = countCemas + "<br> Ringan (Tetap jaga kesehatan mental anda)";
        }
        if(countStress >=16 && countStress <= 18 ){
            document.getElementById("score-depresi").innerHTML = countStress + "<br> Ringan (Tetap jaga kesehatan mental anda)";
        }

        // Jika hasil "Sedang"
        if(countDepresi >=20 && countDepresi <= 24 ){
            document.getElementById("score-stress").innerHTML = countDepresi + "<br> Sedang (Kami sarankan anda untuk berkonsultasi dengan tenaga kesehatan profesional untuk bantuan lebih lanjut)";
        }
        if(countCemas >=20 && countCemas <= 24 ){
            document.getElementById("score-cemas").innerHTML = countCemas + "<br> Sedang (Kami sarankan anda untuk berkonsultasi dengan tenaga kesehatan profesional untuk bantuan lebih lanjut)";
        }
        if(countStress >=20 && countStress <= 24 ){
            document.getElementById("score-depresi").innerHTML = countStress + "<br> Sedang (Kami sarankan anda untuk berkonsultasi dengan tenaga kesehatan profesional untuk bantuan lebih lanjut)";
        }

        // Jika hasil "Berat"
        if(countDepresi >=26 && countDepresi <= 32 ){
            document.getElementById("score-stress").innerHTML = countDepresi + "<br> Berat (Kami sarankan anda untuk berkonsultasi dengan tenaga kesehatan profesional untuk bantuan lebih lanjut)";
        }
        if(countCemas >=26 && countCemas <= 32 ){
            document.getElementById("score-cemas").innerHTML = countCemas + "<br> Berat (Kami sarankan anda untuk berkonsultasi dengan tenaga kesehatan profesional untuk bantuan lebih lanjut)";
        }
        if(countStress >=26 && countStress <= 32 ){
            document.getElementById("score-depresi").innerHTML = countStress + "<br> Berat (Kami sarankan anda untuk berkonsultasi dengan tenaga kesehatan profesional untuk bantuan lebih lanjut)";
        }

        // Jika hasil "Sangat Berat"
        if(countDepresi >=34 && countDepresi <= 42 ){
            document.getElementById("score-stress").innerHTML = countDepresi + "<br> Sangat Berat (Kami sarankan anda untuk berkonsultasi dengan tenaga kesehatan profesional untuk bantuan lebih lanjut)";
        }
        if(countCemas >=34 && countCemas <= 42 ){
            document.getElementById("score-cemas").innerHTML = countCemas + "<br> Sangat Berat (Kami sarankan anda untuk berkonsultasi dengan tenaga kesehatan profesional untuk bantuan lebih lanjut)";
        }
        if(countStress >=34 && countStress <= 42 ){
            document.getElementById("score-depresi").innerHTML = countStress + "<br> Sangat Berat (Kami sarankan anda untuk berkonsultasi dengan tenaga kesehatan profesional untuk bantuan lebih lanjut)";
        }
    }
    generate(i);
}