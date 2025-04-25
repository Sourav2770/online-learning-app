const question = document.querySelector('.question');
const option1 = document.querySelector('#option-1');
const option2 = document.querySelector('#option-2');
const option3 = document.querySelector('#option-3');
const option4 = document.querySelector('#option-4');
const beginBtn = document.querySelector('.begin-btn');
const questionNumber = document.querySelector('.question-number');
const totalQuestions = document.querySelector('.total-questions');
const nextBtn = document.querySelector('.next-btn');
const restartBtn = document.querySelector('.restart-btn');
const error_msg = document.querySelector('.error-msg');
const display_answer = document.querySelector('.display-answer');
const beginQuiz = document.querySelector('.begin-quiz');
const quizArea = document.querySelector('.quiz-area');
const endArea = document.querySelector('.end-area');
const totalScore = document.querySelector('.total-score');

// Global variables
let randomOptions = [];
let currentQuestionIndex = 0;
let opts_input = Array.from(document.getElementsByName('options'));
let quizData = null;
let userScore = 0;
let currentQuestionNumber = 1;

async function getQuizData() {
    const url = 'https://opentdb.com/api.php?amount=10&category=18&type=multiple';
    try {
        const response = await fetch(url);
        if (!response.ok) throw new Error('Failed to fetch data');
        return await response.json();
    } catch (error) {
        console.error(error);
        error_msg.textContent = 'Error fetching quiz data. Please try again.';
        error_msg.classList.remove('hidden');
    }
}

async function startQuiz() {
    clearHTML();
    beginQuiz.classList.add('hidden');
    quizArea.classList.remove('hidden');
    endArea.classList.add('hidden');

    quizData = await getQuizData();
    if (!quizData || quizData.results.length === 0) {
        error_msg.textContent = 'No questions found for this category.';
        error_msg.classList.remove('hidden');
        return;
    }

    renderHTML();
}

function renderHTML() {
    opts_input.forEach(opt => opt.nextElementSibling.classList.remove('correct-answer'));

    const decodeQuestion = decodeHTML(quizData.results[currentQuestionIndex].question);
    question.textContent = decodeQuestion;

    let options = [
        ...quizData.results[currentQuestionIndex].incorrect_answers,
        quizData.results[currentQuestionIndex].correct_answer
    ].map(decodeHTML);

    shuffleOptions(options);

    questionNumber.textContent = currentQuestionNumber;
    totalQuestions.textContent = quizData.results.length;
    option1.nextElementSibling.textContent = randomOptions[0];
    option2.nextElementSibling.textContent = randomOptions[1];
    option3.nextElementSibling.textContent = randomOptions[2];
    option4.nextElementSibling.textContent = randomOptions[3];
}

function shuffleOptions(options) {
    randomOptions = [];
    while (randomOptions.length < options.length) {
        let randomItem = options[Math.floor(Math.random() * options.length)];
        if (!randomOptions.includes(randomItem)) {
            randomOptions.push(randomItem);
        }
    }
}

function nextQuestion() {
    let selectedOption = opts_input.find(opt => opt.checked);
    let correctAnswer = decodeHTML(quizData.results[currentQuestionIndex].correct_answer);

    if (!selectedOption) {
        error_msg.textContent = 'No skipping questions!';
        error_msg.classList.remove('hidden');
        setTimeout(() => {
            error_msg.classList.add('hidden');
        }, 1000);
        return;
    }

    if (selectedOption.nextElementSibling.textContent === correctAnswer) {
        userScore++;
        selectedOption.nextElementSibling.classList.add('correct-answer');
    } else {
        display_answer.textContent = correctAnswer;
        display_answer.classList.remove('hidden');
        setTimeout(() => {
            display_answer.classList.add('hidden');
            renderHTML();
        }, 1000);
    }

    setTimeout(() => {
        currentQuestionNumber++;
        currentQuestionIndex++;
        randomOptions = [];
        clearSelectedOption();

        if (currentQuestionIndex < quizData.results.length) {
            renderHTML();
        } else {
            quizArea.classList.add('hidden');
            endArea.classList.remove('hidden');
            totalScore.textContent = `Score: ${userScore} out of ${quizData.results.length}`;
        }
    }, 1000);
}

function clearSelectedOption() {
    opts_input.forEach(opt => opt.checked = false);
}

function decodeHTML(html) {
    const txt = document.createElement('textarea');
    txt.innerHTML = html;
    return txt.value;
}

function clearHTML() {
    question.textContent = '';
    option1.nextElementSibling.textContent = '';
    option2.nextElementSibling.textContent = '';
    option3.nextElementSibling.textContent = '';
    option4.nextElementSibling.textContent = '';
    randomOptions = [];
    error_msg.classList.add('hidden');
    display_answer.classList.add('hidden');
    userScore = 0;
}

nextBtn.addEventListener('click', nextQuestion);
beginBtn.addEventListener('click', startQuiz);

function restart() {
    location.reload(); // This will refresh the current page
}


