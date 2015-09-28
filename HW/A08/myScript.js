/**
 * Created by Eric on 9/26/2015.
 * note: the function to count the number of links in a url does not work
 */
function faqToggle(qid, aid, qnum)
{
        var txt = document.getElementById(qid).innerHTML;
        var open;

        if(txt.charAt(11) == "+") {
                open = true;
        }
        else {
                open = false;
        }

        if(open) {
                document.getElementById(qid).innerHTML = "Question " + qnum + "(-)" + "<br>" +  "Answer" + qnum;

        }
        else {
                document.getElementById(qid).innerHTML = "Question " + qnum + "(+)";
        }
}

$(document).ready(function(){


        $("form").submit(function(){
                $URL = $("#link").val();
                alert($URL);
                $("#out").html($URL);
        });
});