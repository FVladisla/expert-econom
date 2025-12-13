<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Практико-ориентированные курсы с симуляторами реальных бизнес-процессов. • Уникальные кейсы из российской практики • Интерактивные тренажеры финансовых решений • Гибкие форматы обучения для студентов и предпринимателей • Корпоративные решения для бизнеса  Освойте прикладные навыки управления финансами предприятия в цифровом формате!");
$APPLICATION->SetTitle("Фабрика прибыли: Оптимизация производства");
?><div class="expert-econom-container" style="max-width: 1200px; margin: 0 auto; font-family: 'Arial', sans-serif; color: #333;">
    <style>
        :root {
            --accent-blue: #68BEC1;
            --accent-green: #27ae60;
            --accent-red: #e74c3c;
            --dark-text: #2c3e50;
            --light-bg: #f5f7fa;
        }
        
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light-bg);
            color: var(--dark-text);
            /* line-height: 1.6; */
            margin: 0;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 30px;
            position: relative;
            overflow: hidden;
        }
        
        h1, h2, h3 {
            color: var(--dark-text);
            margin-top: 0;
        }
        
        h1 {
            border-bottom: 2px solid var(--accent-blue);
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: var(--accent-blue);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s;
            text-decoration: none;
            margin-top: 20px;
        }
        
        .btn:hover {
            background: #1a6fb3;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .btn-secondary {
            background: #95a5a6;
        }
        
        .btn-secondary:hover {
            background: #7f8c8d;
        }
        
        .welcome-screen, .month-screen {
            display: none;
            animation: fadeIn 0.5s ease-out;
        }
        
        .active-screen {
            display: block;
        }
        
        .decision-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            border-left: 4px solid var(--accent-blue);
        }
        
        .decision-card h3 {
            margin-top: 0;
            color: var(--accent-blue);
        }
        
        .checkbox-group, .radio-group {
            margin: 15px 0;
        }
        
        .form-control {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        input[type="text"], input[type="number"], select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .progress-container {
            width: 100%;
            background: #e0e0e0;
            border-radius: 5px;
            margin: 30px 0;
            height: 10px;
        }
        
        .progress-bar {
            height: 100%;
            background: var(--accent-blue);
            border-radius: 5px;
            transition: width 0.5s ease;
        }
        
        .month-indicator {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 30px;
            color: var(--accent-blue);
        }
        
        .budget-display {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid var(--accent-green);
        }
        
        .budget-display.warning {
            border-left-color: #f39c12;
        }
        
        .budget-display.danger {
            border-left-color: var(--accent-red);
        }
        
        .event-card {
            background: #fff8e1;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #f39c12;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .hidden {
            display: none;
        }
        
        /* Стили для кастомных чекбоксов */
        .custom-checkbox {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            display: block;
            margin-bottom: 10px;
        }
        
        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #eee;
            border-radius: 4px;
        }
        
        .custom-checkbox:hover .checkmark {
            background-color: #ccc;
        }
        
        .custom-checkbox input:checked ~ .checkmark {
            background-color: var(--accent-blue);
        }
        
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        
        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }
        
        .custom-checkbox .checkmark:after {
            left: 7px;
            top: 3px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
    </style>


    <div class="container">
        <!-- Экран приветствия -->
        <div class="welcome-screen active-screen">
            <h1>Фабрика прибыли: Оптимизация производства</h1>
            
            <div class="budget-display">
                <h3>Ваша задача</h3>
                <p>Вы назначены временным управляющим мебельной фабрики "Дубовая роща", которая находится в кризисном состоянии. За 12 месяцев вам нужно вывести предприятие в прибыль, принимая стратегические решения по всем аспектам работы.</p>
            </div>
            
            <div class="decision-card">
                <h3>Ключевые показатели</h3>
                <ul>
                    <li><strong>Стартовый бюджет:</strong> 5 000 000 руб.</li>
                    <li><strong>Текущие убытки:</strong> 1 200 000 руб./месяц</li>
                    <li><strong>Персонал:</strong> 120 сотрудников</li>
                    <li><strong>Производственные мощности:</strong> 40% загрузки</li>
                </ul>
            </div>
            
            <div class="decision-card">
                <h3>Этапы симуляции</h3>
                <ol>
                    <li>Анализ текущего состояния предприятия</li>
                    <li>Ежемесячное принятие решений по 5 направлениям</li>
                    <li>Просмотр последствий ваших решений</li>
                    <li>Корректировка стратегии на основе результатов</li>
                    <li>Достижение целевых показателей к 12 месяцу</li>
                </ol>
            </div>
            
            <div class="decision-card">
                <h3>Критерии успеха</h3>
                <p>Симуляция считается успешно пройденной, если к 12 месяцу:</p>
                <ul>
                    <li>Прибыль предприятия ≥ 500 000 руб./месяц</li>
                    <li>Уровень долга ≤ 2 000 000 руб.</li>
                    <li>Доля рынка ≥ 15%</li>
                </ul>
            </div>
            
            <button id="startBtn" class="btn">Начать симуляцию</button>
        </div>
        
        <!-- Экран месяца -->
        <div class="month-screen">
            <div class="month-indicator">
                Месяц <span id="currentMonth">1</span> из 12
            </div>
            
            <div class="progress-container">
                <div class="progress-bar" id="monthProgress" style="width: 8.33%"></div>
            </div>
            
            <div class="budget-display" id="budgetInfo">
                <h3>Финансовое состояние</h3>
                <p>Бюджет: <strong id="currentBudget">5 000 000</strong> руб.</p>
                <p>Месячный доход: <strong id="monthIncome">-1 200 000</strong> руб.</p>
                <p>Доля рынка: <strong id="marketShare">8</strong>%</p>
            </div>
            
            <div class="event-card hidden" id="randomEvent">
                <h3>Событие месяца</h3>
                <p id="eventText"></p>
            </div>
            
            <div class="decision-card">
                <h3>1. Закупка сырья</h3>
                <div class="form-control">
                    <label>Выберите поставщика древесины:</label>
                    <select id="woodSupplier">
                        <option value="local">Местный поставщик (дороже, быстрее)</option>
                        <option value="regional">Региональный поставщик (баланс цены/срока)</option>
                        <option value="foreign">Иностранный поставщик (дешевле, медленнее)</option>
                    </select>
                </div>
                
                <div class="form-control">
                    <label>Объем закупки (куб.м):</label>
                    <input type="number" id="woodAmount" min="50" max="500" value="200">
                </div>
            </div>
            
            <div class="decision-card">
                <h3>2. Производство</h3>
                <div class="form-control">
                    <label>Уровень загрузки мощностей:</label>
                    <input type="range" id="productionLevel" min="30" max="100" value="40" style="width: 100%">
                    <div style="display: flex; justify-content: space-between;">
                        <span>30%</span>
                        <span id="productionValue">40%</span>
                        <span>100%</span>
                    </div>
                </div>
                
                <div class="form-control">
                    <label>Контроль качества:</label>
                    <select id="qualityControl">
                        <option value="low">Минимальный (+5% к скорости, -10% к цене)</option>
                        <option value="medium" selected>Стандартный (баланс качества/скорости)</option>
                        <option value="high">Усиленный (-10% к скорости, +15% к цене)</option>
                    </select>
                </div>
            </div>
            
            <div class="decision-card">
                <h3>3. Персонал</h3>
                <div class="checkbox-group">
                    <label class="custom-checkbox">Нанять 10 дополнительных рабочих (+150 000 руб./мес)
                        <input type="checkbox" id="hireWorkers">
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">Провести обучение персонала (-200 000 руб. в этом месяце, +5% к эффективности)
                        <input type="checkbox" id="staffTraining">
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">Сократить 5 административных позиций (-100 000 руб./мес, -3% к морали)
                        <input type="checkbox" id="reduceStaff">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            
            <div class="decision-card">
                <h3>4. Маркетинг</h3>
                <div class="form-control">
                    <label>Бюджет на рекламу (руб.):</label>
                    <input type="number" id="marketingBudget" min="0" max="1000000" value="100000">
                </div>
                
                <div class="form-control">
                    <label>Каналы продвижения (можно выбрать несколько):</label>
                    
                    <label class="custom-checkbox">Социальные сети (+0.5% к доле рынка)
                        <input type="checkbox" id="marketingSocial" checked>
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">Традиционные СМИ (+1% к доле рынка)
                        <input type="checkbox" id="marketingMedia">
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">Партнерские программы (+0.3% к доле рынка)
                        <input type="checkbox" id="marketingPartners">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            
            <div class="decision-card">
                <h3>5. Финансы</h3>
                <div class="form-control">
                    <label>Цена на базовую модель стула (руб.):</label>
                    <input type="number" id="chairPrice" min="500" max="3000" value="1500">
                </div>
                
                <div class="radio-group">
                    <label>Взять кредит:</label>
                    
                    <label class="custom-checkbox">Нет
                        <input type="radio" name="loan" value="none" checked>
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">500 000 руб. под 12% годовых
                        <input type="radio" name="loan" value="small">
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="custom-checkbox">1 500 000 руб. под 15% годовых
                        <input type="radio" name="loan" value="medium">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            
            <div style="display: flex; justify-content: space-between; margin-top: 30px;">
                <button id="prevMonthBtn" class="btn btn-secondary hidden">← Предыдущий месяц</button>
                <button id="nextMonthBtn" class="btn">Следующий месяц →</button>
            </div>
        </div>
    </div>

    <script>
        
        // Состояние симуляции
        const state = {
            currentMonth: 1,
            budget: 5000000,
            monthlyIncome: -1200000,
            marketShare: 8,
            debt: 0,
            decisions: {},
            randomEvents: [
                "Рост цен на древесину на 15% из-за экспортных ограничений",
                "Новый конкурент вышел на рынок, снизив вашу долю рынка на 2%",
                "Технологическая инновация позволяет увеличить производство на 10% без дополнительных затрат",
                "Государственная субсидия в размере 500 000 руб. для поддержки местных производителей",
                "Поломка оборудования требует срочного ремонта (200 000 руб.)",
                "Сезонный спрос увеличивает потенциальные продажи на 20% в этом месяце"
            ]
        };
        
        // DOM элементы
        const welcomeScreen = document.querySelector('.welcome-screen');
        const monthScreen = document.querySelector('.month-screen');
        const startBtn = document.getElementById('startBtn');
        const prevMonthBtn = document.getElementById('prevMonthBtn');
        const nextMonthBtn = document.getElementById('nextMonthBtn');
        const currentMonthEl = document.getElementById('currentMonth');
        const monthProgress = document.getElementById('monthProgress');
        const currentBudgetEl = document.getElementById('currentBudget');
        const monthIncomeEl = document.getElementById('monthIncome');
        const marketShareEl = document.getElementById('marketShare');
        const budgetInfo = document.getElementById('budgetInfo');
        const randomEvent = document.getElementById('randomEvent');
        const eventText = document.getElementById('eventText');
        
        // Элементы решений
        const productionLevel = document.getElementById('productionLevel');
        const productionValue = document.getElementById('productionValue');
        
        // Инициализация
        document.addEventListener('DOMContentLoaded', function() {
            updateBudgetDisplay();
            
            productionLevel.addEventListener('input', function() {
                productionValue.textContent = this.value + '%';
            });
        });
        
        // Начать симуляцию
        startBtn.addEventListener('click', function() {
            welcomeScreen.classList.remove('active-screen');
            monthScreen.classList.add('active-screen');
        });
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth' // Плавная прокрутка
            });
        }
        
        // Следующий месяц
        nextMonthBtn.addEventListener('click', function() {
            saveDecisions();
            calculateResults();
            scrollToTop();

            state.currentMonth++;
            currentMonthEl.textContent = state.currentMonth;
            monthProgress.style.width = (state.currentMonth / 12 * 100) + '%';
            
            updateBudgetDisplay();
            showRandomEvent();
            
            // Показать кнопку "Назад" после первого месяца
            if (state.currentMonth > 1) {
                prevMonthBtn.classList.remove('hidden');
            }
            
            // Изменить текст кнопки на последнем месяце
            if (state.currentMonth === 12) {
                nextMonthBtn.textContent = 'Завершить симуляцию';
            }
            
            // Завершить симуляцию
            if (state.currentMonth > 12) {
                finishSimulation();
            }
        });
        
        // Предыдущий месяц
        prevMonthBtn.addEventListener('click', function() {
            if (state.currentMonth > 1) {
                scrollToTop();
                state.currentMonth--;
                currentMonthEl.textContent = state.currentMonth;
                monthProgress.style.width = (state.currentMonth / 12 * 100) + '%';
                
                // Загрузить решения для этого месяца, если они есть
                loadDecisions();
                updateBudgetDisplay();
                
                // Скрыть кнопку "Назад" на первом месяце
                if (state.currentMonth === 1) {
                    prevMonthBtn.classList.add('hidden');
                }
                
                // Вернуть стандартный текст кнопки "Далее"
                nextMonthBtn.textContent = 'Следующий месяц →';
            }
        });
        
        // Сохранить решения текущего месяца
        function saveDecisions() {
            state.decisions[state.currentMonth] = {
                woodSupplier: document.getElementById('woodSupplier').value,
                woodAmount: parseInt(document.getElementById('woodAmount').value),
                productionLevel: parseInt(productionLevel.value),
                qualityControl: document.getElementById('qualityControl').value,
                hireWorkers: document.getElementById('hireWorkers').checked,
                staffTraining: document.getElementById('staffTraining').checked,
                reduceStaff: document.getElementById('reduceStaff').checked,
                marketingBudget: parseInt(document.getElementById('marketingBudget').value),
                marketingSocial: document.getElementById('marketingSocial').checked,
                marketingMedia: document.getElementById('marketingMedia').checked,
                marketingPartners: document.getElementById('marketingPartners').checked,
                chairPrice: parseInt(document.getElementById('chairPrice').value),
                loan: document.querySelector('input[name="loan"]:checked').value
            };
        }
        
        // Загрузить решения для текущего месяца
        function loadDecisions() {
            const decisions = state.decisions[state.currentMonth];
            if (!decisions) return;
            
            document.getElementById('woodSupplier').value = decisions.woodSupplier;
            document.getElementById('woodAmount').value = decisions.woodAmount;
            productionLevel.value = decisions.productionLevel;
            productionValue.textContent = decisions.productionLevel + '%';
            document.getElementById('qualityControl').value = decisions.qualityControl;
            document.getElementById('hireWorkers').checked = decisions.hireWorkers;
            document.getElementById('staffTraining').checked = decisions.staffTraining;
            document.getElementById('reduceStaff').checked = decisions.reduceStaff;
            document.getElementById('marketingBudget').value = decisions.marketingBudget;
            document.getElementById('marketingSocial').checked = decisions.marketingSocial;
            document.getElementById('marketingMedia').checked = decisions.marketingMedia;
            document.getElementById('marketingPartners').checked = decisions.marketingPartners;
            document.getElementById('chairPrice').value = decisions.chairPrice;
            document.querySelector(`input[name="loan"][value="${decisions.loan}"]`).checked = true;
        }
        
        // Расчет результатов месяца
        function calculateResults() {
            const decisions = state.decisions[state.currentMonth];
            
            // Базовые параметры
            let income = -1200000; // Стартовый убыток
            let marketChange = 0;
            
            // Влияние закупок сырья
            const woodCost = {
                local: 8000,
                regional: 6000,
                foreign: 4500
            };
            
            const woodDeliveryTime = {
                local: 1,
                regional: 2,
                foreign: 4
            };
            
            income -= decisions.woodAmount * woodCost[decisions.woodSupplier];
            
            // Влияние производства
            const productionMultiplier = decisions.productionLevel / 40; // Относительно стартовых 40%
            income *= productionMultiplier;
            
            // Влияние контроля качества
            if (decisions.qualityControl === 'low') {
                income *= 1.05; // +5% к скорости
                income *= 0.9; // -10% к цене
            } else if (decisions.qualityControl === 'high') {
                income *= 0.9; // -10% к скорости
                income *= 1.15; // +15% к цене
            }
            
            // Влияние персонала
            if (decisions.hireWorkers) income -= 150000;
            if (decisions.staffTraining) {
                income -= 200000;
                income *= 1.05; // +5% к эффективности
            }
            if (decisions.reduceStaff) {
                income += 100000;
                income *= 0.97; // -3% к морали
            }
            
            // Влияние маркетинга
            income -= decisions.marketingBudget;
            
            if (decisions.marketingSocial) marketChange += 0.5;
            if (decisions.marketingMedia) marketChange += 1;
            if (decisions.marketingPartners) marketChange += 0.3;
            
            // Влияние цены
            const priceMultiplier = decisions.chairPrice / 1500; // Относительно стартовой цены
            income *= priceMultiplier;
            
            // Влияние кредита
            if (decisions.loan === 'small') {
                state.budget += 500000;
                state.debt += 500000 * 1.12;
            } else if (decisions.loan === 'medium') {
                state.budget += 1500000;
                state.debt += 1500000 * 1.15;
            }
            
            // Обновление состояния
            state.budget += income;
            state.monthlyIncome = income;
            state.marketShare = Math.min(100, Math.max(0, state.marketShare + marketChange));
        }
        
        // Показать случайное событие
        function showRandomEvent() {
            // 30% вероятность события
            if (Math.random() < 0.3) {
                const randomIndex = Math.floor(Math.random() * state.randomEvents.length);
                eventText.textContent = state.randomEvents[randomIndex];
                randomEvent.classList.remove('hidden');
                
                // Применить эффекты события
                applyEventEffects(randomIndex);
            } else {
                randomEvent.classList.add('hidden');
            }
        }
        
        // Применить эффекты события
        function applyEventEffects(eventIndex) {
            switch(eventIndex) {
                case 0: // Рост цен на древесину
                    state.monthlyIncome *= 0.85;
                    break;
                case 1: // Новый конкурент
                    state.marketShare = Math.max(0, state.marketShare - 2);
                    break;
                case 2: // Технологическая инновация
                    state.monthlyIncome *= 1.1;
                    break;
                case 3: // Субсидия
                    state.budget += 500000;
                    break;
                case 4: // Поломка оборудования
                    state.budget -= 200000;
                    break;
                case 5: // Сезонный спрос
                    state.monthlyIncome *= 1.2;
                    break;
            }
            
            updateBudgetDisplay();
        }
        
        // Обновить отображение бюджета
        function updateBudgetDisplay() {
            currentBudgetEl.textContent = formatNumber(state.budget);
            monthIncomeEl.textContent = formatNumber(state.monthlyIncome);
            marketShareEl.textContent = state.marketShare.toFixed(1);
            
            // Изменить цвет в зависимости от состояния
            if (state.monthlyIncome > 0) {
                monthIncomeEl.style.color = 'var(--accent-green)';
            } else {
                monthIncomeEl.style.color = 'var(--accent-red)';
            }
            
            if (state.budget < 1000000) {
                budgetInfo.classList.add('danger');
                budgetInfo.classList.remove('warning');
            } else if (state.budget < 3000000) {
                budgetInfo.classList.add('warning');
                budgetInfo.classList.remove('danger');
            } else {
                budgetInfo.classList.remove('warning', 'danger');
            }
        }
        
        // Завершить симуляцию
        function finishSimulation() {
            const success = state.monthlyIncome >= 500000 && state.debt <= 2000000 && state.marketShare >= 15;
            
            monthScreen.innerHTML = `
                <h1>Результаты симуляции</h1>
                
                <div class="decision-card" style="text-align: center;">
                    <h2 style="color: ${success ? 'var(--accent-green)' : 'var(--accent-red)'}">
                        ${success ? 'ПОБЕДА! Вы спасли предприятие!' : 'УВЫ! Предприятие не вышло на целевые показатели'}
                    </h2>
                </div>
                
                <div class="budget-display">
                    <h3>Финальные показатели</h3>
                    <p>Остаток бюджета: <strong>${formatNumber(state.budget)} руб.</strong></p>
                    <p>Месячная прибыль: <strong>${formatNumber(state.monthlyIncome)} руб.</strong></p>
                    <p>Доля рынка: <strong>${state.marketShare.toFixed(1)}%</strong></p>
                    <p>Общий долг: <strong>${formatNumber(state.debt)} руб.</strong></p>
                </div>
                
                <div class="decision-card">
                    <h3>Рекомендации</h3>
                    ${getRecommendations()}
                </div>
                
                <div style="text-align: center; margin-top: 30px;">
                    <button onclick="location.reload()" class="btn">Начать заново</button>
                </div>
            `;
        }
        
        // Получить рекомендации по результатам
        function getRecommendations() {
            let recommendations = '';
            
            if (state.monthlyIncome < 500000) {
                recommendations += '<p>• Увеличьте производственную эффективность или оптимизируйте затраты</p>';
            }
            
            if (state.debt > 2000000) {
                recommendations += '<p>• Слишком большая долговая нагрузка. Ищите альтернативные источники финансирования</p>';
            }
            
            if (state.marketShare < 15) {
                recommendations += '<p>• Усильте маркетинговую активность для увеличения доли рынка</p>';
            }
            
            if (state.budget < 1000000) {
                recommendations += '<p>• Недостаточный запас ликвидности. Снизьте расходы или найдите инвесторов</p>';
            }
            
            return recommendations || '<p>Все показатели в норме. Отличная работа!</p>';
        }
        
        // Форматирование чисел
        function formatNumber(num) {
            return num.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
        }

    </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>