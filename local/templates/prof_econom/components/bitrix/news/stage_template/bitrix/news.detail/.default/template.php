<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
// Получаем ID текущего пользователя
global $USER;
$userId = $USER->GetID();
$testId = $arResult['ID']; // ID текущего теста/этапа

// Формируем массив вопросов
$questions = [];
for ($i = 1; $i <= 5; $i++) {
    $qKey = ['FIRST', 'SECOND', 'THIRD', 'FOUR', 'FIVE'][$i-1];
    $cKey = ['ONE', 'TWO', 'THREE', 'FOUR', 'FIVE'][$i-1];
    
    if (!empty($arResult['PROPERTIES'][$qKey.'_Q']['VALUE'])) {
        $correct = $arResult['PROPERTIES']['CORRECT_'.$cKey]['VALUE'];
        $correctAnswers = is_array($correct) ? $correct : explode(',', $correct);
        $answers = is_array($arResult['PROPERTIES'][$qKey.'_Q_ANSWER']['VALUE']) 
            ? $arResult['PROPERTIES'][$qKey.'_Q_ANSWER']['VALUE'] 
            : explode("\n", $arResult['PROPERTIES'][$qKey.'_Q_ANSWER']['VALUE'] ?? '');
        
        $answers = array_filter($answers, function($a) {
            return trim(is_array($a) ? $a['VALUE'] : $a) !== '';
        });
        
        $questions[] = [
            'number' => $i,
            'question' => $arResult['PROPERTIES'][$qKey.'_Q']['VALUE'],
            'answers' => array_values($answers),
            'correct' => array_map('trim', $correctAnswers),
            'is_multiple' => count($correctAnswers) > 1,
            'total_correct' => count($correctAnswers),
            'total_wrong' => count($answers) - count($correctAnswers)
        ];
    }
}
$totalQuestions = count($questions);
?>

<div class="course-test" id="courseTest">
    <!-- Прогресс-бар -->
    <div class="progress" style="margin-bottom: 20px; height: 8px; background: #e0e0e0; border-radius: 4px;">
        <div class="progress-bar" id="testProgress" 
             style="width: <?=(100/$totalQuestions)?>%; height: 100%; background: #4CAF50; border-radius: 4px; transition: width 0.3s ease;"></div>
    </div>
    
    <!-- Контейнер для вопросов -->
    <div id="questionsContainer">
        <?foreach($questions as $index => $q):?>
        <div class="question-block" id="question<?=$index?>" style="display: <?=$index == 0 ? 'block' : 'none'?>;">
            <h3 style="color: #2c3e50; margin-top: 0; padding-bottom: 10px; border-bottom: 1px solid #eee;">Вопрос <?=$q['number']?>: <?=htmlspecialcharsbx($q['question'])?></h3>
            
            <div class="answers-list">
                <?foreach($q['answers'] as $ansIndex => $answer):?>
                    <?php $answerValue = is_array($answer) ? $answer['VALUE'] : $answer; ?>
                    <input type="<?=$q['is_multiple'] ? 'checkbox' : 'radio'?>" 
                        id="q<?=$index?>_<?=$ansIndex?>" 
                        name="q<?=$index?><?=$q['is_multiple'] ? '[]' : ''?>" 
                        value="<?=htmlspecialcharsbx(trim($answerValue))?>">
                    <label for="q<?=$index?>_<?=$ansIndex?>">
                        <?=htmlspecialcharsbx($answerValue)?>
                    </label>
                <?endforeach;?>
            </div>
        </div>
        <?endforeach;?>
    </div>
    
    <!-- Навигация -->
    <div class="test-nav" style="margin-top: 30px; display: flex; justify-content: space-between;">
        <button id="prevBtn" onclick="prevQuestion()" 
                style="padding: 10px 20px; background: #95a5a6; color: white; border: none; border-radius: 4px; cursor: pointer; display: none;">
            ← Назад
        </button>
        
        <div>
            <button id="nextBtn" onclick="nextQuestion()" 
                    style="padding: 10px 20px; background: var(--accent_blue); color: white; border: none; border-radius: 4px; cursor: pointer;">
                <?=($totalQuestions > 1) ? 'Далее →' : 'Проверить'?>
            </button>
            <button id="submitBtn" onclick="checkAnswers()" 
                    style="padding: 10px 20px; background: #2ecc71; color: white; border: none; border-radius: 4px; cursor: pointer; display: none;">
                Проверить ответы
            </button>
        </div>
    </div>
</div>

<script>
// Данные теста
let currentQuestion = 0;
const questionsCount = <?=$totalQuestions?>;
const userAnswers = Array(questionsCount).fill().map(() => []);
const questionsData = <?=json_encode($questions)?>;
const userId = <?=$userId?>;

// Инициализация теста
document.addEventListener('DOMContentLoaded', function() {
    updateNavButtons();
});

// Навигация между вопросами
function nextQuestion() {
    saveCurrentAnswers();
    if (currentQuestion < questionsCount - 1) {
        switchQuestion(currentQuestion + 1);
    } else {
        checkAnswers();
    }
}

function prevQuestion() {
    switchQuestion(currentQuestion - 1);
}

function switchQuestion(newIndex) {
    document.getElementById(`question${currentQuestion}`).style.display = 'none';
    currentQuestion = newIndex;
    document.getElementById(`question${currentQuestion}`).style.display = 'block';
    updateNavButtons();
    restoreAnswers();
}

// Сохранение и восстановление ответов
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

// Проверка результатов и сохранение
function checkAnswers() {
    saveCurrentAnswers();
    let totalScore = 0;
    let resultsHtml = `
        <div class="test-results" style="max-width: 800px; margin: 0 auto; padding: 20px;">
            <h2 style="color: #2c3e50; border-bottom: 2px solid var(--accent_blue); padding-bottom: 10px; margin-top: 0;">
                Результаты тестирования
            </h2>
    `;
    
    // Обработка каждого вопроса
    questionsData.forEach((q, index) => {
        const selected = userAnswers[index];
        const correct = q.correct;
        let questionScore = 0;
        let correctSelected = 0;
        let wrongSelected = 0;
        
        // Подсчет баллов
        if (q.is_multiple) {
            selected.forEach(ans => {
                correct.includes(ans) ? correctSelected++ : wrongSelected++;
            });
            
            const pointsPerCorrect = 1 / q.total_correct;
            const penaltyPerWrong = q.total_wrong > 0 ? (1 / q.total_wrong) : 0;
            questionScore = Math.max(0, (correctSelected * pointsPerCorrect) - (wrongSelected * penaltyPerWrong));
        } else {
            if (selected.length > 0 && correct.includes(selected[0])) {
                questionScore = 1;
                correctSelected = 1;
            }
        }
        
        totalScore += questionScore;
        
        // Формирование результата вопроса
        resultsHtml += `
            <div class="question-result" style="margin: 20px 0; padding: 15px; 
                background: ${questionScore > 0 ? '#e8f5e9' : '#ffebee'}; 
                border-left: 4px solid ${questionScore > 0 ? '#4CAF50' : '#F44336'};
                border-radius: 4px;">
                <h3 style="margin-top: 0; color: #2c3e50;">Вопрос ${q.number}: ${q.question}</h3>
                <p><strong>Ваши ответы:</strong> ${selected.length > 0 ? selected.join(', ') : '—'}</p>
                <!--<p><strong>Правильные ответы:</strong> ${correct.join(', ')}</p>!-->
                <p><strong>Результат:</strong> ${questionScore.toFixed(2)} балла/ 1.00 балла</p>
            </div>
        `;
    });
    
    // Итоговый результат
    const percentage = (totalScore / questionsCount) * 100;
    const resultClass = percentage >= 70 ? 'success' : percentage >= 50 ? 'warning' : 'danger';
    
    resultsHtml += `
        <div class="total-result ${resultClass}" style="margin: 30px 0; padding: 25px; 
            background: ${percentage >= 70 ? '#e8f5e9' : percentage >= 50 ? '#fff8e1' : '#ffebee'}; 
            border-radius: 5px; text-align: center; border: 1px solid ${percentage >= 70 ? '#c8e6c9' : percentage >= 50 ? '#ffe0b2' : '#ffcdd2'};">
            <h2 style="margin-top: 0; color: #2c3e50;">Итоговый результат</h2>
            <div style="font-size: 24px; margin: 20px 0;">
                <span style="color: #2c3e50;">Вы набрали:</span>
                <strong style="color: ${percentage >= 70 ? '#27ae60' : percentage >= 50 ? '#f39c12' : '#e74c3c'}; font-size: 28px;">
                    ${totalScore.toFixed(2)}
                </strong>
                <span style="color: #2c3e50;"> из ${questionsCount} баллов</span>
            </div>
            <div style="font-size: 20px; margin-bottom: 20px;">
                <span style="color: #2c3e50;">Процент правильных ответов:</span>
                <strong style="color: ${percentage >= 70 ? '#27ae60' : percentage >= 50 ? '#f39c12' : '#e74c3c'};">
                    ${percentage.toFixed(1)}%
                </strong>
            </div>
            
            <div id="saveStatus" style="margin: 15px 0;"></div>
            
            <div style="margin-top: 25px;">
                <a href="/products/4/" style="display: inline-block; padding: 12px 25px; 
                    background: var(--accent_blue); color: white; text-decoration: none; border-radius: 4px;
                    transition: background 0.3s;">
                    Вернуться к списку курсов
                </a>
            </div>
        </div>
        </div>
    `;
    
    // Замена контента
    document.getElementById('courseTest').innerHTML = resultsHtml;
    
    // Отправка результатов на сервер
    saveTestResult(totalScore);
}

// Сохранение результата через AJAX
function saveTestResult(totalScore) {
    const statusElement = document.getElementById('saveStatus');
    statusElement.innerHTML = '<div class="alert alert-info">Сохранение результатов...</div>';
    
    // Получаем максимальный балл из PHP
    const maxScore = <?=$arResult['PROPERTIES']['MAX_RESULT']['VALUE'] ?? 1?>; 
    const percentage = (totalScore / <?=$totalQuestions?>) * 100;
    
    BX.ajax({
        url: '<?=$this->GetFolder()?>/ajax.php',
        data: {
            action: 'save_result',
            sessid: BX.bitrix_sessid(),
            test_id: <?=$arResult['ID']?>,
            score: totalScore,
            max_score: maxScore,
            percentage: percentage
        },
        method: 'POST',
        dataType: 'json',
        onsuccess: function(result) {
            if(result.status === 'success') {
                statusElement.innerHTML = '<div class="alert alert-success">✓ Результат сохранен</div>';
                // Показываем нормализованный результат
                showFinalResult(totalScore, maxScore, percentage);
            } else {
                statusElement.innerHTML = '<div class="alert alert-danger">Ошибка: ' + result.message + '</div>';
            }
        },
        onfailure: function() {
            statusElement.innerHTML = '<div class="alert alert-danger">Приносим свои извинения, сохранение результата временно недоступно</div>';
            // Все равно показываем результат, но без сохранения
            showFinalResult(totalScore, maxScore, percentage); 
        }
    });
}
function showFinalResult(score, maxScore, percentage) {
    const normalizedScore = (score / <?=$totalQuestions?>) * maxScore;
    const container = document.getElementById('courseTest');
    
    container.innerHTML = `
        <div class="test-result">
            <h2>Результаты тестирования</h2>
            <div class="result-item">
                <span>Набрано баллов:</span>
                <strong>${normalizedScore.toFixed(2)} из ${maxScore}</strong>
            </div>
            <div class="result-item">
                <span>Процент выполнения:</span>
                <strong>${percentage.toFixed(1)}%</strong>
            </div>
            <div class="result-details">
                ${generateQuestionResults()}
            </div>
        </div>
    `;
}
// Обновление навигации
function updateNavButtons() {
    document.getElementById('prevBtn').style.display = currentQuestion > 0 ? 'block' : 'none';
    
    if (currentQuestion < questionsCount - 1) {
        document.getElementById('nextBtn').style.display = 'inline-block';
        document.getElementById('nextBtn').textContent = 'Далее →';
        document.getElementById('submitBtn').style.display = 'none';
    } else {
        document.getElementById('nextBtn').style.display = 'none';
        document.getElementById('submitBtn').style.display = 'inline-block';
    }
    
    document.getElementById('testProgress').style.width = `${((currentQuestion + 1) / questionsCount) * 100}%`;
}
</script>

<style>
.question-block {
    padding: 20px;
    margin-bottom: 20px;
    background: white;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}
/* Скрываем стандартные элементы */
.question-block input[type="checkbox"],
.question-block input[type="radio"] {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
}

/* Стили для кастомных чекбоксов и радиокнопок */
.question-block label {
    position: relative;
    display: block;
    padding-left: 35px;
    margin: 10px -12px;
    cursor: pointer;
    transition: all 0.3s;
}

.question-block label:hover {
    background: #f5f5f5;
}

/* Базовый стиль для "галочки" */
.question-block label:before {
    content: '';
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    border: 2px solid #ddd;
    background: #fff;
    transition: all 0.3s;
}

/* Стиль для чекбокса */
.question-block input[type="checkbox"] + label:before {
    border-radius: 4px;
}

/* Стиль для радиокнопки */
.question-block input[type="radio"] + label:before {
    border-radius: 50%;
}

/* Состояние "checked" */
.question-block input[type="checkbox"]:checked + label:before,
.question-block input[type="radio"]:checked + label:before {
    border-color: var(--accent_blue);
    background-color: var(--accent_blue);
}

/* Галочка для чекбокса */
.question-block input[type="checkbox"]:checked + label:after {
    content: '';
    position: absolute;
    left: 19px;
    top: 43%;
    transform: translateY(-50%) rotate(45deg);
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
}

/* Точка для радиокнопки */
.question-block input[type="radio"]:checked + label:after {
    content: '';
    position: absolute;
    left: 17px;
    top: 50%;
    transform: translateY(-50%);
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: white;
}
/* Текст ответа */
.question-block label {
    padding-left: 45px; /* Общий отступ текста */
    line-height: 1.4;
}

/* Увеличим отступ при наведении */
.question-block label:hover {
    padding-left: 48px;
    background: #f0f0f0;
}
/* Фокус-стили
.question-block input[type="checkbox"]:focus + label:before,
.question-block input[type="radio"]:focus + label:before {
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.3);
} */
.answers-list label:hover {
    background: #eceff1;
    transform: translateX(5px);
}

.test-nav button {
    transition: all 0.2s;
}

.test-nav button:hover {
    opacity: 0.9;
    transform: translateY(-2px);
}

.question-result {
    transition: all 0.3s;
}

.question-result:hover {
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.total-result.success {
    background: #e8f5e9 !important;
    border-color: #c8e6c9 !important;
}

.total-result.warning {
    background: #fff8e1 !important;
    border-color: #ffe0b2 !important;
}

.total-result.danger {
    background: #ffebee !important;
    border-color: #ffcdd2 !important;
}
</style>

<?php
// Получаем ID привязанного курса
$courseId = $arResult['PROPERTIES']['COURSE_ID']['VALUE'];

// Получаем символьный код курса
$courseCode = '';
if ($courseId) {
    $res = CIBlockElement::GetByID($courseId);
    if ($arCourse = $res->GetNext()) {
        $courseCode = $arCourse['CODE'];
    }
}
?>

<!-- Кнопка "Назад" -->
<div style="margin-bottom: 20px;">
    
        <a href="/products/4/<?=htmlspecialcharsbx($courseId)?>/" 
           style="display: inline-flex; align-items: center; color: var(--accent_blue); text-decoration: none;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="margin-right: 8px;">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Вернуться к курсу
        </a>
</div>
