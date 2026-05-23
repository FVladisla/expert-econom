// calculateScore.test.js
// Функция, которую тестируем
function calculateQuestionScore(question, selectedAnswers) {
    const correctAnswers = question.correct;
    const isMultiple = question.is_multiple;
    const totalCorrect = question.total_correct;
    const totalWrong = question.total_wrong;
    
    if (!selectedAnswers || selectedAnswers.length === 0) {
        return 0;
    }
    
    if (!isMultiple) {
        return correctAnswers.includes(selectedAnswers[0]) ? 1 : 0;
    }
    
    let correctSelected = 0;
    let wrongSelected = 0;
    
    selectedAnswers.forEach(answer => {
        if (correctAnswers.includes(answer)) {
            correctSelected++;
        } else {
            wrongSelected++;
        }
    });
    
    const pointsPerCorrect = 1 / totalCorrect;
    const penaltyPerWrong = totalWrong > 0 ? (1 / totalWrong) : 0;
    let score = (correctSelected * pointsPerCorrect) - (wrongSelected * penaltyPerWrong);
    
    return Math.max(0, score);
}

// Тесты
describe('Функция подсчёта баллов за вопрос', () => {
    
    test('Одиночный выбор: правильный ответ даёт 1 балл', () => {
        const question = {
            correct: ['A'],
            is_multiple: false,
            total_correct: 1,
            total_wrong: 3
        };
        const result = calculateQuestionScore(question, ['A']);
        expect(result).toBe(1);
    });
    
    test('Одиночный выбор: неправильный ответ даёт 0 баллов', () => {
        const question = {
            correct: ['A'],
            is_multiple: false,
            total_correct: 1,
            total_wrong: 3
        };
        const result = calculateQuestionScore(question, ['B']);
        expect(result).toBe(0);
    });
    
    test('Одиночный выбор: отсутствие ответа даёт 0 баллов', () => {
        const question = {
            correct: ['A'],
            is_multiple: false,
            total_correct: 1,
            total_wrong: 3
        };
        const result = calculateQuestionScore(question, []);
        expect(result).toBe(0);
    });
    
    test('Множественный выбор: все ответы правильные', () => {
        const question = {
            correct: ['A', 'B'],
            is_multiple: true,
            total_correct: 2,
            total_wrong: 2
        };
        const result = calculateQuestionScore(question, ['A', 'B']);
        expect(result).toBe(1);
    });
    
    test('Множественный выбор: 1 из 2 правильных ответов', () => {
        const question = {
            correct: ['A', 'B'],
            is_multiple: true,
            total_correct: 2,
            total_wrong: 2
        };
        const result = calculateQuestionScore(question, ['A', 'C']);
        expect(result).toBe(0);
    });
    
    test('Множественный выбор: все ответы неправильные', () => {
        const question = {
            correct: ['A', 'B'],
            is_multiple: true,
            total_correct: 2,
            total_wrong: 2
        };
        const result = calculateQuestionScore(question, ['C', 'D']);
        expect(result).toBe(0);
    });
    
    test('Множественный выбор: результат не может быть отрицательным', () => {
        const question = {
            correct: ['A'],
            is_multiple: true,
            total_correct: 1,
            total_wrong: 1
        };
        const result = calculateQuestionScore(question, ['B', 'C', 'D']);
        expect(result).toBe(0);
    });
});