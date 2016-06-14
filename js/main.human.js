function ricxvebi() {
    var random = {
        min: 5,
        max: 9
    };
    var masivi = [];
    for (var i = 0; i < 12; i++) {
        var randRicxvi = Math.floor(Math.random() * (random.max - random.min + 1) + random.min);
        masivi.push(randRicxvi);

    } // for cycle

    // console.log(masivi);
    return masivi;
} // ricxvebi (fn)






function cvl(e) {
    // სურათების ინიციალიზება
    var r2_1 = $("#1"),
        r2_2 = $("#2"),
        r2_3 = $("#3"),
        r2_4 = $("#4"),
        r2_5 = $("#5"),
        r2_6 = $("#6");
    // პირველი მწკრივი
    var r1_l = $("#timer"),
        r1_m = $("#gamr"),
        r1_r = $("#time");
    // მესამე მწკრივი
    var r3_l = $("#no"),
        r3_r = $("#yes");

    // 
    var g = 0,
        b = 0;
    var counter = 0;
    setInterval(function () {
        r1_l.text(moment().hour(0).minute(0).second(counter++).format('HH : mm : ss'));
    }, 1000)





    function gamravleba() {
        $("img").removeClass("bad");
        $("img").removeClass("good");

        var masivi = ricxvebi();
        console.log(masivi);
        var mult_1 = masivi[0] * masivi[1],
            mult_2 = masivi[2] * masivi[3],
            mult_3 = masivi[4] * masivi[5],
            mult_4 = masivi[6] * masivi[7],
            mult_5 = masivi[8] * masivi[9],
            mult_6 = masivi[10] * masivi[11];

        // ფუნცქციის სწორი მუშაობის მტკიცებულება
        //        console.log(masivi[0] + " X " + masivi[1] + " = " + mult_1 + " 1");
        //        console.log(masivi[2] + " X " + masivi[3] + " = " + mult_2 + " 2");
        //        console.log(masivi[4] + " X " + masivi[5] + " = " + mult_3 + " 3");
        //        console.log(masivi[6] + " X " + masivi[7] + " = " + mult_4 + " 4");
        //        console.log(masivi[8] + " X " + masivi[9] + " = " + mult_5 + " 5");
        //        console.log(masivi[10] + " X " + masivi[11] + " = " + mult_6 + " 6");

        // ვამოწმებ უნულობაზე და ვამატებ ნულს
        var plius_noliani = [mult_1, mult_2, mult_3, mult_4, mult_5, mult_6];
        for (var d = 0; d < 6; d++) {
            if (plius_noliani[d] < 10) {
                plius_noliani[d] = "0" + plius_noliani[d];
                // console.log("this is it: " + arrImg[d]);
            }
        }

        // რანდომად ვარჩევ 6-დან სწორ პასუხს
        var swori = Math.floor(Math.random() * (6 - 0) + 0);
        r2_1.attr("src", "img/" + plius_noliani[0] + ".jpg");
        r2_2.attr("src", "img/" + plius_noliani[1] + ".jpg");
        r2_3.attr("src", "img/" + plius_noliani[2] + ".jpg");
        r2_4.attr("src", "img/" + plius_noliani[3] + ".jpg");
        r2_5.attr("src", "img/" + plius_noliani[4] + ".jpg");
        r2_6.attr("src", "img/" + plius_noliani[5] + ".jpg");

        // Print სამრავლი X მამრავლი
        switch (swori) {
            case 0:
                $("#gamr").text(masivi[0] + " X " + masivi[1] + " = ");
                break;
            case 1:
                $("#gamr").text(masivi[2] + " X " + masivi[3] + " = ");
                break;
            case 2:
                $("#gamr").text(masivi[4] + " X " + masivi[5] + " = ");
                break;
            case 3:
                $("#gamr").text(masivi[6] + " X " + masivi[7] + " = ");
                break;
            case 4:
                $("#gamr").text(masivi[8] + " X " + masivi[9] + " = ");
                break;
            case 5:
                $("#gamr").text(masivi[10] + " X " + masivi[11] + " = ");
                break;
            default:
                $("#gamr").text("ammm... WTH: " + swori)
        } // switch სამრავლი X მამრავლი
        function check(e) {
            //  console.log(plius_noliani[swori] + " swori pasuxi");
            if (e.target.currentSrc.match(plius_noliani[swori])) {
                $('img').off("click", check);
                //  console.log(e.target.currentSrc.match(plius_noliani[swori]) + "  true");
                // console.log(typeof (swori));
                $(e.target).addClass("good");
                g++;
                r3_r.text(g);
                setTimeout(function () {
                    gamravleba()
                }, 1000)


            } else {
                console.log(e.target.currentSrc.match(plius_noliani[swori].toString()) + "  false")
                    // console.log(typeof (swori.toString()));
                $(e.target).addClass("bad");
                b--;
                r3_l.text(b);

            }
            //  console.log(e.target.currentSrc)
        } // check (fn)
        $('img').on("click", check);

    } // gamravleba (fn)







    // სურათების შეცვლა
    //    r2_1.attr("src", "img/20.jpg");
    //    r2_2.attr("src", "img/22.jpg");
    //    r2_3.attr("src", "img/23.jpg");
    //    r2_4.attr("src", "img/28.jpg");
    //    r2_5.attr("src", "img/80.jpg");
    //    r2_6.attr("src", "img/90.jpg");

    // ტექსტის შეცვლა
    //    r1_m.text("სამრავლიXმამრავლი");

    gamravleba();


    console.info("cvladebi inicializirebuli");
} // cvl (fn)



$(document).ready(cvl);
