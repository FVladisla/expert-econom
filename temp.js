// ============================================
// temp.js - чистый JS для анализа CodeMetrics
// Эмуляция логики тестирования
// ============================================

// Данные теста (эмуляция)
let currentQuestion = 0;
const questionsCount = 5;
const maxScore = 5;

// Эмуляция данных вопросов
const questionsData = [
    { number: 1, correct: ['A'], is_multiple: false, total_correct: 1, total_wrong: 3 },
    { number: 2, correct: ['B', 'C'], is_multiple: true, total_correct: 2, total_wrong: 2 },
    { number: 3, correct: ['D'], is_multiple: false, total_correct: 1, total_wrong: 3 },
    { number: 4, correct: ['A', 'D'], is_multiple: true, total_correct: 2, total_wrong: 2 },
    { number: 5, correct: ['C'], is_multiple: false, total_correct: 1, total_wrong: 3 }
];

// Массив для хранения ответов пользователя
let userAnswers = Array(questionsCount).fill().map(() => []);

// ============================================
// Функции навигации
// ============================================

function nextQuestion() {
    saveCurrentAnswers();
    if (currentQuestion < questionsCount - 1) {
        switchQuestion(currentQuestion + 1);
    } else {
        checkAnswers();
    }
}

function prevQuestion() {
    if (currentQuestion > 0) {
        switchQuestion(currentQuestion - 1);
    }
}

function switchQuestion(newIndex) {
    const oldQuestion = document.getElementById(`question${currentQuestion}`);
    if (oldQuestion) {
        oldQuestion.style.display = 'none';
    }
    
    currentQuestion = newIndex;
    
    const newQuestion = document.getElementById(`question${currentQuestion}`);
    if (newQuestion) {
        newQuestion.style.display = 'block';
    }
    
    updateNavButtons();
    restoreAnswers();
    updateProgressBar();
}

// ============================================
// Функции работы с ответами
// ============================================

function saveCurrentAnswers() {
    const inputs = document.querySelectorAll(`#question${currentQuestion} input:checked`);
    userAnswers[currentQuestion] = Array.from(inputs).map(input => input.value);
}

function restoreAnswers() {
    const inputs = document.querySelectorAll(`#question${currentQuestion} input`);
    inputs.forEach(input => {
        input.checked = userAnswers[currentQuestion].includes(input.value);
    });
}

// ============================================
// Функция проверки результатов (сложная логика)
// ============================================

function checkAnswers() {
    saveCurrentAnswers();
    let totalScore = 0;
    let results = [];
    
    for (let index = 0; index < questionsData.length; index++) {
        const q = questionsData[index];
        const selected = userAnswers[index] || [];
        const correct = q.correct;
        
        let questionScore = 0;
        let correctSelected = 0;
        let wrongSelected = 0;
        
        if (q.is_multiple) {
            // Множественный выбор: считаем правильные и неправильные ответы
            for (let i = 0; i < selected.length; i++) {
                if (correct.includes(selected[i])) {
                    correctSelected++;
                } else {
                    wrongSelected++;
                }
            }
            
            const pointsPerCorrect = 1 / q.total_correct;
            const penaltyPerWrong = q.total_wrong > 0 ? (1 / q.total_wrong) : 0;
            questionScore = (correctSelected * pointsPerCorrect) - (wrongSelected * penaltyPerWrong);
            
            if (questionScore < 0) {
                questionScore = 0;
            }
        } else {
            // Одиночный выбор
            if (selected.length > 0 && correct.includes(selected[0])) {
                questionScore = 1;
                correctSelected = 1;
            }
        }
        
        totalScore += questionScore;
        
        results.push({
            questionNumber: q.number,
            score: questionScore,
            correctSelected: correctSelected,
            wrongSelected: wrongSelected
        });
    }
    
    const percentage = (totalScore / questionsCount) * 100;
    
    displayResults(totalScore, percentage, results);
    saveTestResult(totalScore, percentage);
    
    return { totalScore, percentage, results };
}

// ============================================
// Функции обновления интерфейса
// ============================================

function updateNavButtons() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    
    if (prevBtn) {
        prevBtn.style.display = currentQuestion > 0 ? 'block' : 'none';
    }
    
    if (nextBtn && submitBtn) {
        if (currentQuestion < questionsCount - 1) {
            nextBtn.style.display = 'inline-block';
            nextBtn.textContent = 'Далее →';
            submitBtn.style.display = 'none';
        } else {
            nextBtn.style.display = 'none';
            submitBtn.style.display = 'inline-block';
        }
    }
}

function updateProgressBar() {
    const progressBar = document.getElementById('testProgress');
    if (progressBar) {
        const percent = ((currentQuestion + 1) / questionsCount) * 100;
        progressBar.style.width = `${percent}%`;
    }
}

// ============================================
// Функции отображения результатов
// ============================================

function displayResults(totalScore, percentage, results) {
    const container = document.getElementById('courseTest');
    if (!container) return;
    
    let successClass = 'success';
    let bgColor = '#e8f5e9';
    let textColor = '#27ae60';
    
    if (percentage < 50) {
        successClass = 'danger';
        bgColor = '#ffebee';
        textColor = '#e74c3c';
    } else if (percentage < 70) {
        successClass = 'warning';
        bgColor = '#fff8e1';
        textColor = '#f39c12';
    }
    
    let resultsHtml = `
        <div class="total-result ${successClass}" style="margin: 30px 0; padding: 25px; 
            background: ${bgColor}; border-radius: 5px; text-align: center;">
            <h2>Итоговый результат</h2>
            <div style="font-size: 24px; margin: 20px 0;">
                <span>Вы набрали:</span>
                <strong style="color: ${textColor}; font-size: 28px;">
                    ${totalScore.toFixed(2)}
                </strong>
                <span> из ${questionsCount} баллов</span>
            </div>
            <div style="font-size: 20px; margin-bottom: 20px;">
                <span>Процент правильных ответов:</span>
                <strong style="color: ${textColor};">
                    ${percentage.toFixed(1)}%
                </strong>
            </div>
        </div>
    `;
    
    // Добавляем детальные результаты по каждому вопросу
    for (let i = 0; i < results.length; i++) {
        const r = results[i];
        const isCorrect = r.score > 0;
        const itemBg = isCorrect ? '#e8f5e9' : '#ffebee';
        const borderColor = isCorrect ? '#4CAF50' : '#F44336';
        
        resultsHtml += `
            <div class="question-result" style="margin: 20px 0; padding: 15px; 
                background: ${itemBg}; border-left: 4px solid ${borderColor};">
                <h3>Вопрос ${r.questionNumber}</h3>
                <p><strong>Результат:</strong> ${r.score.toFixed(2)} балла</p>
            </div>
        `;
    }
    
    container.innerHTML = resultsHtml;
}

// ============================================
// Функция сохранения результата (AJAX эмуляция)
// ============================================

function saveTestResult(totalScore, percentage) {
    const statusElement = document.getElementById('saveStatus');
    if (statusElement) {
        statusElement.innerHTML = '<div class="alert alert-info">Сохранение результатов...</div>';
    }
    
    // Эмуляция AJAX-запроса
    setTimeout(function() {
        if (statusElement) {
            statusElement.innerHTML = '<div class="alert alert-success">✓ Результат сохранен</div>';
        }
        console.log('Результат сохранен:', { totalScore, percentage });
    }, 500);
}

// ============================================
// Инициализация при загрузке страницы
// ============================================

function initTest() {
    updateNavButtons();
    updateProgressBar();
    console.log('Тест инициализирован, вопросов:', questionsCount);
}

// Эмуляция события DOMContentLoaded
if (typeof document !== 'undefined') {
    document.addEventListener('DOMContentLoaded', initTest);
}