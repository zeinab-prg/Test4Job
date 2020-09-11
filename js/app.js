const popupw = document.querySelector('.popup-wrapper');
const popup = document.querySelector('.popup');
const startTest = document.querySelector('#startTest');
const test = document.querySelector('#test');
const timeDiv = document.querySelector('.timeDiv');
const scoreDiv = document.querySelector('.scoreDiv');
const userScore = document.querySelector('#userScore');

const lang = document.getElementById("lang").innerHTML;
/* -------- to change the current question number -------- */
const numQuestion = document.querySelector("#numQuestion");
/* -------- correctAnswers -------- */
let correctAnswers;
const htmlAnswers = ['B', 'D', 'B', 'A', 'C', 'A', 'B', 'D', 'A', 'C'];
const jsAnswers = ['B', 'C', 'B', 'D', 'C', 'B', 'B', 'B', 'D', 'C'];
const sqlAnswers = ['B', 'B', 'D', 'A', 'C', 'A', 'A', 'D', 'A', 'A'];
const phpAnswers = ['A', 'B', 'D', 'C', 'C', 'D', 'B', 'A', 'B', 'C'];

switch (lang) {
    case 'HTML':
        correctAnswers = htmlAnswers;
        break;
    case 'JavaScript':
        correctAnswers = jsAnswers;
        break;
    case 'SQL':
        correctAnswers = sqlAnswers;
        break;
    case 'PHP':
        correctAnswers = phpAnswers;
        break;
    default:
        console.log('something wrong!');
}

let score = 0;

startTest.addEventListener('click', () => {
    popupw.style.display = 'none';
    test.style.display = 'block';
    startTimer();
});

/* ------- display questions one by one ------- */
const questions = document.querySelector(".questions");
const next = document.querySelector("#next");
const form = document.querySelector('#form');
let index = 0;

//questions.childNodes[1].style.display = "block";
questions.children[index].style.display = "block";

next.addEventListener('click', () => {
    if (index <= 8) {
        t = 60;
        questions.children[index].style.display = "none";
        index++;
        questions.children[index].style.display = "block";
        numQuestion.innerHTML = `${index + 1}`;
        if (index === 9)
            next.innerHTML = "Grade me!";
    } else {
        t = 1;
    }
});


/* -------------- Time Left! -------------- */
const timeLeft = document.querySelector("#timeLeft");
let t = 60;
let m = 0;
let s = 0;

function startTimer() {

    let timeFunction = setInterval(() => {
        t -= 1;
        /* stop timeFunction when t == 0 */
        if (!t) {
            if (index <= 8) {
                t = 60;
                questions.children[index].style.display = "none";
                index++;
                questions.children[index].style.display = "block";
                numQuestion.innerHTML = `${index + 1}`;
                if (index === 9)
                    next.innerHTML = "Grade me!";
            } else {
                clearInterval(timeFunction);
                let userAnswers = [form.q0.value, form.q1.value, form.q2.value, form.q3.value, form.q4.value, form.q5.value, form.q6.value, form.q7.value, form.q8.value, form.q9.value];
                //check answers and display score
                questions.children[index].style.display = "none";
                next.style.display = "none";
                timeDiv.style.display = "none";
                scoreDiv.style.display = "flex";
                userAnswers.forEach((answer, i) => {
                    if (answer === correctAnswers[i])
                        score++;
                });
                userScore.innerHTML = `${score}`;

                // ---------- insert score ----------
                const data = new FormData();
                data.append('score', score);
                data.append('lang', lang);

                const xhr = new XMLHttpRequest();
                xhr.open("POST", "insertResult.php", true);
                xhr.send(data);

            }
        }

        m = Math.floor(t / 60)
        s = t % 60;
        timeLeft.innerHTML = `${m}:${s}`;
    }, 1000);
}