function ricxvebi() {
    var random = {
        min: 3,
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
    let row2 = [$("#1"),$("#2"),$("#3"),$("#4"),$("#5"),$("#6"),];


    // პირველი მწკრივი
    var r1_l = $("#timer"),
        r1_m = $("#gamr"),
        answ = $("#answ"),
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
    }, 1500)

    function resetGoodBad() {
        $("img").removeClass("bad");
        $("img").removeClass("good");
    }
    function good() {
        $(e.target).addClass("good");
        g++;
        r3_r.text(g);

    }
    function bad() {
        $(e.target).addClass("bad");
        b--;
        r3_l.text(b);
    }


    function gamravleba() {
        resetGoodBad();

        var masivi = ricxvebi();
        // console.log(masivi);
        let imagesCalc = [[],[]];
        let counter = 0;
        masivi.forEach(function (value,index) {
            // debugger;

            let luwi = index % 2 == 0;
            let masivis_dasasruli =  masivi[index+1] != undefined;


            if ( index == 0 || luwi  && masivis_dasasruli) {

                let samravli = masivi[index];
                let mamravli = masivi[index+1];
                let shedegi = samravli * mamravli;

                imagesCalc[0][counter] = shedegi;
                imagesCalc[1][`${samravli}x${mamravli}`] = shedegi;

                counter++;
            }
        });
        // debugger;
        console.log(imagesCalc);

        // ვამოწმებ უნულობაზე და ვამატებ ნულს
        var plius_noliani = imagesCalc[0];
        for (var d = 0; d < 6; d++) {
            if (plius_noliani[d] < 10) {
                plius_noliani[d] = "0" + plius_noliani[d];
            }
        }

        // რანდომად ვარჩევ 6-დან სწორ პასუხს
        var swori = Math.floor(Math.random() * (6 - 0) + 0);

        for(let i = 0; i<=5; i++) {
            row2[i]
                .attr("src", "img/" + plius_noliani[i] + ".jpg")
                .attr('alt', plius_noliani[i])
                .attr("title", plius_noliani[i]);
        }

        console.log(plius_noliani[swori] + " <= სწორი პასუხია");

        // Print სამრავლი X მამრავლი
        switch (swori) {
            case 0:
                $("#gamr").text(masivi[0] + "x" + masivi[1] + "=");
                break;
            case 1:
                $("#gamr").text(masivi[2] + "x" + masivi[3] + "=");
                break;
            case 2:
                $("#gamr").text(masivi[4] + "x" + masivi[5] + "=");
                break;
            case 3:
                $("#gamr").text(masivi[6] + "x" + masivi[7] + "=");
                break;
            case 4:
                $("#gamr").text(masivi[8] + "x" + masivi[9] + "=");
                break;
            case 5:
                $("#gamr").text(masivi[10] + "x" + masivi[11] + "=");
                break;
            default:
                $("#gamr").text("am... WTH: " + swori)
        } // switch სამრავლი X მამრავლი

        function check(e) {
            //  console.log(plius_noliani[swori] + " swori pasuxi");
            if (e.target.currentSrc.match(plius_noliani[swori])) {
                $('img').off("click", check);

                answ.text(plius_noliani[swori]);

                good();
                setTimeout(function () {
                    gamravleba();
                    answ.text("answer");
                },200)
            } else {
                bad()
            }
        } // check (fn)
        $('img').on("click", check);
    } // gamravleba (fn)


    gamravleba();


} // cvl (fn)



$(document).ready(cvl);
