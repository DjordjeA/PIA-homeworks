let timer = 90;
let runningTimer;
let score=0;
let username="";
let qNumber;
let finalScore;
const MAX_HIGH_SCORES=7;

const startButton = document.getElementById("startButton");
const qContainer = document.getElementById("questionsContainer");
const qElement = document.getElementById("question");
const answerButtons = document.getElementById("answers");
const countdown = document.getElementById("timerArea");
const scoreArea = document.getElementById("scoreArea");
const highScoresButton = document.getElementById("showScoresButton");