// calculateScore.js
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

module.exports = calculateQuestionScore;