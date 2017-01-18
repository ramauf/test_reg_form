<?php
class la{
    public static function ng($str){
        return langClass::$instance->translated[$str];
    }
}

class langClass{
    public static $instance = null;
    public static function init($lang = 'ru'){
        if (is_null(self::$instance)){
            self::$instance = new self($lang);
        }
        return self::$instance;
    }
    protected function __construct($lang){
        if ($lang == 'ru'){
            foreach ($this->translate as $ind => $val) $this->translated[$ind] = $ind;
        }else{
            foreach ($this->translate as $ind => $val) $this->translated[$ind] = $val[$lang];
        }
    }
    public $translated = array();
    protected $translate = array(
        'Уже зарегистрированы?' => array('en' => 'Already registered?'),
        'Вход' => array('en' => 'Sign In'),
        'Регистрация' => array('en' => 'Registration'),
        'Поздравляем!' => array('en' => 'Congratulations!'),
        'Вы успешно зарегистрировались в нашей системе, теперь можете авторизоваться и приступать к работе. Сейчас вы будете перенаправлены в личный кабинет...' => array('en' => 'You are registered successfully, now you can log in and start to work. Now you will be redirected to your personal account ...'),
        'Станьте участником системы' => array('en' => 'Become a member'),
        'Ошибка!' => array('en' => 'Error!'),
        'Зарегистрироваться не удалось, попробуйте еще раз' => array('en' => 'Sign up failed, please try again'),
        'Никнейм' => array('en' => 'Nickname'),
        'Необходимо для авторизации' => array('en' => 'Required for authorization'),
        'Email адрес' => array('en' => 'Email address'),
        'Необходимо для авторизации и восстановления доступа' => array('en' => 'Required for authorization and password recovery'),
        'Пароль' => array('en' => 'Password'),
        'Запомните его или запишите' => array('en' => 'Remember it or write'),
        'Подтвердите пароль' => array('en' => 'Confirm password'),
        'Должен совпадать с предыдущим полем' => array('en' => 'It must match the previous field'),
        'Обзор' => array('en' => 'View'),
        'Выберите рисунок' => array('en' => 'Pick a picture'),
        'Ваше имя' => array('en' => 'Your first name'),
        'Ваша фамилия' => array('en' => 'Your last name'),
        'Статус' => array('en' => 'Status'),
        'Работодатель' => array('en' => 'Employer'),
        'Соискатель' => array('en' => 'Applicant'),
        'Номер мобильного телефона' => array('en' => 'Mobile phone number'),
        'Регистрация' => array('en' => 'Registration'),
        'Введие ваш никнейм' => array('en' => 'Enter your nickname'),
        'Указанный никнейм уже зарегистрирован, попробуйте другой' => array('en' => 'This nickname is already registered, try another'),
        'Введите ваш email адрес' => array('en' => 'Enter your email address'),
        'Email адрес должен быть валиден' => array('en' => 'Email address must be valid'),
        'Указанный email уже зарегистрирован, попробуйте другой' => array('en' => 'This email is already registered, try another'),
        'Введите пароль' => array('en' => 'Enter password'),
        'Необходимо не менее {0} символов' => array('en' => 'Not less than {0} characters'),
        'Необходимо ввести до {0} символов' => array('en' => 'Not more than {0} characters'),
        'Введите ваш пароль еще раз' => array('en' => 'Enter your password again'),
        'Пароль должен совпадать с предыдущим полем' => array('en' => 'The password must match the previous field'),
        'Введите ваше имя' => array('en' => 'Enter your first name'),
        'Введите вашу фамилию' => array('en' => 'Enter your last name'),
        'Выберите ваш статус' => array('en' => 'Check your status'),
        'О нас' => array('en' => 'About us'),
        'Мы поможем вам найти работодателя с интересными проектами или талантливого соискателя для реализации ваших идей!' => array('en' => 'We can help you find an employer with interesting projects and talented competitor for the realization of your ideas!'),
        'Работодателям' => array('en' => 'For employers'),
        'На нашем ресурсе собраны лучшие умы в области информационных технологий, у нас нету дворников или таксистов, исключительно IT сфера' => array('en' => 'On our website contains the best minds in the field of information technology, we do not have janitors or taxi drivers, exclusively IT sphere'),
        'Соискателям' => array('en' => 'For applicants'),
        'Мы не понаслышке знаем как сегодня сложно толковому дизайнеру или программисту с большим опытом найти адекватного заказчика с интересными проектами, именно поэтому мы прикладываем максимум усилий, чтобы привлечь крупных рекламодателей на наш ресурс' => array('en' => 'We know firsthand how difficult today explanatory designer or programmer with a lot of experience to find the adequate customer with interesting projects, which is why we put every effort to attract major advertisers on our resource'),
        'Авторизация' => array('en' => 'Authorization'),
        'Неверная пара логин/пароль, попробуйте еще раз' => array('en' => 'Invalid login or password, please try again'),
        'E-mail или никнейм' => array('en' => 'Email or nickname'),
        'Укажите свой email либо никнейм для авторизации' => array('en' => 'Enter your email address or nickname to log in'),
        'Пароль для входа в систему' => array('en' => 'Password to login'),
        'Еще не зарегистрированы?' => array('en' => 'Not a member?'),
        'Профиль' => array('en' => 'Profile'),
        'Выход' => array('en' => 'log out')
    );
}