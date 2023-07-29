
 function Validator(option) {
    var formElement = document.querySelector(option.form);

    // xử lý để phù hợp vớt tất cả các form
    function getParent(element, selector) {
        while (element.parentElement) {
            // hàm matches kiểm tra xem dữ liệu hiện tại có khớp với CSS selector hay không : return true or false
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }
    var saveRules = {};
    // Xử lý validator
    function validate(inputElement, rule) {
        var errorElement = getParent(inputElement, option.formGroup).querySelector(option.errorSelector);
        var errorMessage;
        // xu ly nhieu validator
        var saveRule = saveRules[rule.selector];
        for (var i = 0; i < saveRule.length; i++) {
            switch (inputElement.type) {
                case 'radio':
                case 'checkbox':
                    errorMessage = saveRule[i](
                        formElement.querySelector(rule.selector + ':checked')
                    );
                    break;
                default:
                    errorMessage = saveRule[i](inputElement.value);
            }
            if (errorMessage) {
                break;
            }
        }
        if (errorMessage) {
            errorElement.innerText = errorMessage;
            errorElement.parentElement.classList.add("invalid");
        } else {
            errorElement.innerText = "";
            errorElement.parentElement.classList.remove("invalid");
        }
        // xu ly trai nghiem nguoi dung
        return !errorMessage;
    }
    if (formElement) {
        formElement.addEventListener("submit", function (e) {
            e.preventDefault();
            var formValid = true;
            option.rules.forEach(function (rule) {
                var inputElement = formElement.querySelector(rule.selector);
                var isValid = validate(inputElement, rule);
                if (!isValid) {
                    formValid = false;
                }
            });
            if (formValid) {
                console.log(formElement);
                formElement.submit();
            }
        })
        // duyet thuoc tinh Rules cua obj Validator
        option.rules.forEach(function (rule) {
            var inputElement = formElement.querySelector(rule.selector);
            // kiem tra va luu tat ca validate vao obj saveRules voi key la rule.selector :  []
            // kiem tra xem saveRules[rule.selector] da la array chua neu chua thi bien no thanh arr
            if (Array.isArray(saveRules[rule.selector])) {
                saveRules[rule.selector].push(rule.test);
            } else {
                // bien la array nhan vao gia tri dau tien cua mang la rule.test
                saveRules[rule.selector] = [rule.test]
            }
            if (inputElement) {
                inputElement.onblur = function () {
                    validate(inputElement, rule);
                }
                inputElement.addEventListener("input", function () {
                    var errorElement = getParent(inputElement, option.formGroup).querySelector(option.errorSelector);
                    errorElement.innerText = "";
                    errorElement.parentElement.classList.remove("invalid");
                })
            }
        });
    }
}


Validator.isRequired = function (selector, myMessage) {
    return {
        selector: selector,
        test: function (value) {
            return value ? undefined : myMessage || "please enter this field";
        }
    }
}
Validator.isSpecialChar = function (selector, myMessage) {
    return {
        selector: selector,
        test: function (value) {
            var regex1 = /^[a-zA-Z0-9]+$/;
            return regex1.test(value) ? undefined : myMessage || "please do not enter special character";
        }
    }
}
Validator.isEmail = function (selector, myMessage) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : myMessage || "please enter in the format";
        }
    }
}
Validator.isPassword = function (selector, min, myMessage) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined : myMessage || `please enter from ${min} characters`;
        }
    }
}
Validator.confirmPassword = function (selector, getpassElement, myMessage) {
    return {
        selector: selector,
        test: function (value) {
            return value === getpassElement().value ? undefined : myMessage || "password is not the same";
        }
    }
}
// có 6 gia tri khi convert sang bolean sẽ là false 0 , "" , undefined , null , NaN , false   

