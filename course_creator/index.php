<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("ЭкспертЭконом");
?>
<div class="constructor-container" style="max-width: 1200px; margin: 0 auto; font-family: Arial, sans-serif; padding: 20px;">
    
    <!-- Шапка конструктора -->
    <div class="constructor-header" style="margin-bottom: 30px;">
        <h1 style="color: var(--primary); margin: 0 0 10px 0; display: flex; align-items: center;">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 10px;">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                <circle cx="12" cy="9" r="1"></circle>
                <path d="M11 12h2v4h-2z"></path>
                <path d="M14 6l-4 4M10 6l4 4"></path>
            </svg>
            Конструктор курсов
        </h1>
        <p style="color: var(--gray); margin: 0;">Создавайте и редактируйте курсы для вашей платформы</p>
    </div>
    <!-- Основная сетка -->
    <div class="constructor-grid" style="display: grid; grid-template-columns: 300px 1fr; gap: 30px; min-height: 600px;">
        
        <!-- Левая панель - список курсов/разделов -->
        <div class="constructor-sidebar" style="background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); overflow: hidden; display: flex; flex-direction: column;">
            
            <!-- Заголовок панели -->
            <div style="padding: 20px; border-bottom: 1px solid rgba(0,0,0,0.1);">
                <h3 style="margin: 0 0 15px 0; color: var(--primary);">Ваши курсы</h3>
                <button class="btn-new-course" style="width: 100%; padding: 10px 15px; background: var(--accent_blue); color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: 500; transition: background 0.3s;"
                        onmouseover="this.style.backgroundColor='#2980b9'"
                        onmouseout="this.style.backgroundColor='var(--accent_blue)'">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="vertical-align: middle; margin-right: 8px;">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Новый курс
                </button>
            </div>
            <!-- Список курсов -->
            <div class="courses-list" style="flex: 1; overflow-y: auto; padding: 10px;">
                <div class="course-item" style="padding: 12px 15px; border-radius: 4px; margin-bottom: 8px; background: rgba(52, 152, 219, 0.1); border-left: 3px solid var(--accent_blue); cursor: pointer;"
                     onmouseover="this.style.backgroundColor='rgba(52, 152, 219, 0.15)'"
                     onmouseout="this.style.backgroundColor='rgba(52, 152, 219, 0.1)'">
                    <div style="font-weight: 500; color: var(--accent_blue);">Экономика предприятия</div>
                    <div style="font-size: 12px; color: var(--gray); margin-top: 2px;">Изменен: 12.12.2023</div>
                </div>
                
                <div class="course-item" style="padding: 12px 15px; border-radius: 4px; margin-bottom: 8px; background: white; border: 1px solid rgba(0,0,0,0.1); cursor: pointer;"
                     onmouseover="this.style.backgroundColor='#f5f5f5'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-weight: 500; color: var(--primary);">Маркетинг для начинающих</div>
                    <div style="font-size: 12px; color: var(--gray); margin-top: 2px;">Изменен: 10.12.2023</div>
                </div>
                
                <!-- Пустой шаблон для новых курсов -->
                <div class="course-item-template" style="display: none; padding: 12px 15px; border-radius: 4px; margin-bottom: 8px; background: white; border: 1px solid rgba(0,0,0,0.1); cursor: pointer;"
                     onmouseover="this.style.backgroundColor='#f5f5f5'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-weight: 500; color: var(--primary);"></div>
                    <div style="font-size: 12px; color: var(--gray); margin-top: 2px;">Только что создан</div>
                </div>
            </div>
            <!-- Статистика -->
            <div style="padding: 15px; border-top: 1px solid rgba(0,0,0,0.1); background: #f9f9f9;">
                <div style="font-size: 14px; color: var(--gray);">Всего курсов: <span style="color: var(--primary); font-weight: 500;">2</span></div>
            </div>
        </div>
        <!-- Правая панель - редактор курса -->
        <div class="constructor-main" style="background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); overflow: hidden; display: flex; flex-direction: column;">
            
            <!-- Заголовок редактора -->
            <div style="padding: 20px; border-bottom: 1px solid rgba(0,0,0,0.1);">
                <h2 style="margin: 0 0 5px 0; color: var(--primary); display: flex; align-items: center; justify-content: space-between;">
                    <span>Редактирование курса: <span id="course-title">Экономика предприятия</span></span>
                    <button class="btn-save" style="padding: 8px 20px; background: #27ae60; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: 500; transition: background 0.3s;"
                            onmouseover="this.style.backgroundColor='#219955'"
                            onmouseout="this.style.backgroundColor='#27ae60'">
                        Сохранить курс
                    </button>
                </h2>
                <div style="font-size: 14px; color: var(--gray);">ID в Битрикс: 145</div>
            </div>
            <!-- Форма редактирования -->
            <div class="editor-content" style="flex: 1; overflow-y: auto; padding: 20px;">
                
                <!-- Блок 1: Основная информация -->
                <div class="section-card" style="margin-bottom: 30px; border: 1px solid rgba(0,0,0,0.1); border-radius: 6px; overflow: hidden;">
                    <div class="section-header" style="background: #f9f9f9; padding: 15px 20px; border-bottom: 1px solid rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="margin: 0; color: var(--primary); display: flex; align-items: center;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="margin-right: 10px;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12" y2="8"></line>
                            </svg>
                            Основная информация
                        </h3>
                        <span class="section-toggle" style="cursor: pointer; color: var(--accent_blue);">▼</span>
                    </div>
                    <div class="section-body" style="padding: 20px;">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Название курса *</label>
                                <input type="text" class="form-input" style="width: 100%; padding: 10px 15px; border: 1px solid rgba(0,0,0,0.2); border-radius: 4px; font-size: 14px;"
                                       value="Экономика предприятия: от теории к практике">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Категория</label>
                                <select class="form-select" style="width: 100%; padding: 10px 15px; border: 1px solid rgba(0,0,0,0.2); border-radius: 4px; font-size: 14px; background: white;">
                                    <option>Экономика и финансы</option>
                                    <option>Маркетинг</option>
                                    <option>Программирование</option>
                                    <option>Дизайн</option>
                                </select>
                            </div>
                        </div>
                        
                        <div style="margin-top: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Описание курса</label>
                            <textarea class="form-textarea" style="width: 100%; padding: 10px 15px; border: 1px solid rgba(0,0,0,0.2); border-radius: 4px; font-size: 14px; min-height: 100px; resize: vertical;">Этот курс научит вас принимать финансовые решения на основе реальных кейсов российских компаний. Вы освоите ключевые понятия экономики предприятия и научитесь применять их на практике.</textarea>
                        </div>
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-top: 20px;">
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Длительность (часов)</label>
                                <input type="number" class="form-input" style="width: 100%; padding: 10px 15px; border: 1px solid rgba(0,0,0,0.2); border-radius: 4px; font-size: 14px;"
                                       value="20" min="1" max="500">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Сложность</label>
                                <select class="form-select" style="width: 100%; padding: 10px 15px; border: 1px solid rgba(0,0,0,0.2); border-radius: 4px; font-size: 14px; background: white;">
                                    <option>Начальный</option>
                                    <option selected>Средний</option>
                                    <option>Продвинутый</option>
                                </select>
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: var(--dark);">Статус</label>
                                <select class="form-select" style="width: 100%; padding: 10px 15px; border: 1px solid rgba(0,0,0,0.2); border-radius: 4px; font-size: 14px; background: white;">
                                    <option selected>В разработке</option>
                                    <option>Активный</option>
                                    <option>Скрытый</option>
                                    <option>Архивный</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
            

</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>