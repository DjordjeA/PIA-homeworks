let timer = 200; //10 pitanja po 20 sekundi = 200 sekundi za svako pitanje
let runningTimer;
let score=0;
let username="";
let qNumber;
let finalScore;
const MAX_HIGH_SCORES=10; //neka bude 10 rezultata

const startButton = document.getElementById("startButton");
const qContainer = document.getElementById("questionsContainer");
const qElement = document.getElementById("question");
const answerButtons = document.getElementById("answers");
const countdown = document.getElementById("timerArea");
const scoreArea = document.getElementById("scoreArea");
const highScoresButton = document.getElementById("showScoresButton");

let highScores=JSON.parse(localStorage.getItem("highScores")) || []; //za pakovanje rezultata

startButton.addEventListener("click", startGame);
highScoresButton.addEventListener("click", displayScores);

function startGame() {
	startButton.classList.add("hide");
	scoreArea.classList.add("hide");
	answerButtons.classList.remove("hide");
	qNumber=0;
	scoreArea.innerHTML="";
	startClock();
	while(answerButtons.firstChild){
		answerButtons.removeChild(answerButtons.firstChild);
	}
	showQuestion(questions[qNumber]);
}
function startClock(){
	countdown.innerHTML="Preostalo vreme: "+timer;
	if(timer<=0){
		//game over logicno, dodacu kasnije
	} else{
		timer-=1;
		runningTimer = setTimeout(startClock,1000);
	}
}
