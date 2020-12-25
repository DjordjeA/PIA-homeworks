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
	qContainer.classList.remove("hide");
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
		gameOver();
	} else{
		timer-=1;
		runningTimer = setTimeout(startClock,1000);
	}
}
function gameOver(){
	clearInterval(runningTimer);
	countdown.innerHTML="Finished";
	clearQuestion();
	showResults();
	startButton.innerText="Restart";
	startButton.classList.remove("hide");
	timer=200;
	score=0;
}
function showResults() {
  finalScore = timer;
  if (finalScore < 0) {
    finalScore = 0;
  }
  qElement.innerText = "";
  scoreArea.classList.remove("hide");
  answerButtons.classList.add("hide");
  scoreArea.innerHTML = `Tvoj rezultat je ${finalScore}!<div id="init">Name: <input type="text" name="initials" id="initials" placeholder="Unesi svoje ime"><button id="save-btn" class="save-btn btn" onclick="submitScores(event)" disabled>Save</button>`;
  username = document.getElementById("initials");
  saveButton = document.getElementById("save-btn");
  username.addEventListener("keyup", function() {
    saveButton.disabled = !username.value;
  });
}

function submitScores(e){
	const score={
		score: finalScore,
		name:username.value
	};
	highScores.push(score);
	highScores.sort((a,b)=>b.score-a.score);
	highScores.splice(MAX_HIGH_SCORES);
	
	localStorage.setItem("highScores", JSON.stringify(highScores));
	displayScores();
}
function displayScores(){
	clearInterval(runningTimer);
	countdown.innerHTML="";
	clearQuestion();
	qElement.innerText="";
	scoreArea.classList.remove("hide");
	
	scoreArea.innerHTML = `<h2>Najbolji rezultati</h2><ul id="highScoresList"></ul><button id="clearScores" class="btn" onclick="clearScores()">Obrisi najbolje rezultate</button>`;
  const highScoresList = document.getElementById("highScoresList");
  highScoresList.innerHTML = highScores
    .map(score => {
      return `<li class="scoresList">${score.name} - ${score.score}</li>`;
    })
    .join("");
  startButton.classList.remove("hide");
  highScoresButton.classList.add("hide");
}

function clearScores(){
	highScores=[];
	highScoresList.innerHTML="<h3>Rezultati su obrisani</h3>";
	document.getElementById("clearScores").classList.add("hide");
}
function showQuestion(question){
	qElement.innerText=question.question;
	question.answers.forEach(answer => {
		const button = document.createElement("button");
		button.innerText=answer.text;
		button.classList.add("btn");
		if(answer.correct){
			button.dataset.correct=answer.correct;
		}
		button.addEventListener("click", selectAnswer);
		answerButtons.appendChild(button);
	});
}
function selectAnswer(e) {
	const selectedButton=e.target;
	if(!selectedButton.dataset.correct){
		timer=timer-10;
		console.log(timer);
	}
	if(qNumber==questions.length-1){
		gameOver();
	}
	else{
		clearQuestion();
		qNumber++;
		showQuestion(questions[qNumber]);
		console.log(score);
	}
}
function clearQuestion(){
	while(answerButtons.firstChild){
		answerButtons.removeChild(answerButtons.firstChild);
	}
}
const questions = [
  {
    question: "Ko je najbolji teniser sveta?",
    answers: [
      { text: "Rafael Nadal", correct: false },
      { text: "Novak Djokovic", correct: true },
      { text: "Dominik Tim", correct: false },
      { text: "Aleksandar Zverev", correct: false }
    ]
  },
  {
    question: "Ko je najtrofejniji trener KK Partizan?",
    answers: [
      { text: "Zeljko Obradovic", correct: false },
      { text: "Dusan Ivkovic", correct: false },
      { text: "Andrea Trinkijeri", correct: false },
      { text: "Dusko Vujosevic", correct: true }
    ]
  },
  {
    question: "FK Crvena Zvezda je 3 puta osvajao Ligu Sampiona.",
    answers: [
      { text: "Istina", correct: false },
      { text: "Laz", correct: true }
    ]
  },
  {
    question: "Najvise golova u istoriji za FK Barselonu je postigao:",
    answers: [
      { text: "Ronaldinjo", correct: false },
      { text: "Luis Suarez", correct: false },
      { text: "Lionel Mesi", correct: true },
      { text: "Samjuel Eto'o", correct: false }
    ]
  },
  {
    question: "Srpski kosarkas Nikola Jokic je rodjen u kom nasem gradu?",
    answers: [
      { text: "Sombor", correct: true },
      { text: "Beograd", correct: false },
      { text: "Krusevac", correct: false },
      { text: "Kragujevac", correct: false }
    ]
  },
  {
    question: "Koji klub je osvojio Englesku Premijer ligu za sezonu 2019/2020?",
    answers: [
      { text: "Totenhem", correct: false },
      { text: "Aston Vila", correct: false },
      { text: "Mancester Junajted", correct: false },
      { text: "Liverpul", correct: true }
    ]
  },
  {
    question: "Najbolji igrac po izboru FIFE za 2020. godinu je?",
    answers: [
      { text: "Kristijano Ronaldo", correct: false },
      { text: "Kilijan Mbape", correct: false },
      { text: "Robert Levandovski", correct: true },
      { text: "Lionel Mesi", correct: false }
    ]
  },
  {
    question: "Najbolji kosarkas u NBA svih vremena je:",
    answers: [
      { text: "Majkl Dzordan", correct: true },
      { text: "Hakim Olajdzuvon", correct: false },
      { text: "Medzik Dzonson", correct: false },
      { text: "Lebron Dzejms", correct: false }
    ]
  },
  {
    question: "Novak Djokovic je prvu gren slem titulu osvojio 2008. godine.",
    answers: [
      { text: "Istina", correct: true },
      { text: "Laz", correct: false }
    ]
  },
  {
    question: "Jedina reprezentacija koga je Srbija pobedila na SP u fudbalu 2010. godine je:",
    answers: [
      { text: "Danska", correct: false },
      { text: "Austrija", correct: false },
      { text: "Nemacka", correct: true },
      { text: "Portugalija", correct: false }
    ]
  },
  {
    question: "Sasa Djordjevic je osvojio srebrnu medalju na Svetskom prvenstvu u kosarci sa reprezentacijom Srbije kao trener.",
    answers: [
      { text: "Istina", correct: true },
      { text: "Laz", correct: false }
    ]
  },
  {
  question: "Reprezentacija Srbije U20 je osvojila svetsko prvenstvo u fudbalu na Novom Zelnadu koje godine?",
    answers: [
      { text: "2013", correct: false },
      { text: "2014", correct: false },
      { text: "2015", correct: true },
      { text: "2016", correct: false }
    ]
  },
]

