// Class definition
var KTFormControls = function () {
	// Private functions
	var _initDemo1 = function () {
		FormValidation.formValidation(
			document.getElementById('kt_form_1'),
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'البريد الإلكتروني كطلوب'
							},
							emailAddress: {
								message: 'البريد الإلكتروني المدخل غير صحيح!'
							}
						}
					},

					url: {
						validators: {
							notEmpty: {
								message: 'الرابط مطلوب'
							},
							uri: {
								message: 'عنوان الرابط غير صحيح'
							}
						}
					},

					name: {
						validators: {
							notEmpty: {
								message: 'الإسم مطلوب'
							},
							username: {
								message: 'الإسم المدخل غير صحيح'
							},
                            stringLength: {
                                min: 4,
                                max: 100,
                                message: 'يجب أن يكون الإسم أكثر من 4 حروف '
                            }
						}
					},

                    address: {
						validators: {
							notEmpty: {
								message: 'العنوان مطلوب'
							},
							address: {
								message: 'العنوان غير صحيح'
							},
                            stringLength: {
                                min: 8,
                                max: 100,
                                message: 'يجب أن يكون العنوان أكثر من 8 حروف '
                            }
						}
					},

					digits: {
						validators: {
							notEmpty: {
								message: 'Digits is required'
							},
							digits: {
								message: 'The velue is not a valid digits'
							}
						}
					},

					creditcard: {
						validators: {
							notEmpty: {
								message: 'رقم البطاقة مطلوب'
							},
							creditCard: {
								message: 'رقم البطاقة غير صحيح'
							}
						}
					},

					phone: {
						validators: {
							notEmpty: {
								message: 'رقم الهاتف مطلوب'
							},
							phone: {
								country: 'sa',
								message: 'ادخل رقم هاتف صحيح'
							}
						}
					},

                    username: {
						validators: {
							notEmpty: {
								message: 'إسم المستخدم مطلوب'
							},
                            username: {
								message: 'ادخل اسم مستخدم صحيح!'
							},
                            stringLength: {
                                min:4,
                                max:100,
                                message: 'يجب أن يكون إسم المستخدم أكثر من 4 حروف '
                            }
						}
					},

                    password: {
						validators: {
							notEmpty: {
								message: 'كلمة المرور مطلوب'
							},
                            password: {
								message: 'ادخل كلمة مرور صحيحة!'
							},
                            stringLength: {
                                min:6,
                                max:100,
                                message: 'يجب أن تكون كلمة المرور أكثر من 6 حروف '
                            },
                            passwordStrength: {
							    message: 'كلمة المرور ضعيفة!'
                            }
						}
					},

                    repassword: {
						validators: {
							notEmpty: {
								message: 'كلمة المرور مطلوب'
							},
                            repassword: {
								message: 'ادخل كلمة مرور صحيحة!'
							},
                            stringLength: {
                                min:6,
                                max:100,
                                message: 'يجب أن تكون كلمة المرور أكثر من 6 حروف '
                            },
                            passwordStrength: {
							    message: 'كلمة المرور ضعيفة!'
                            }
						}
					},

                    image: {
						validators: {
							notEmpty: {
								message: 'يجب إختيار صورة!'
							},
						}
					},

					option: {
						validators: {
							notEmpty: {
								message: 'يجب إختيار واحد على الأخل'
							}
						}
					},

					options: {
						validators: {
							choice: {
								min:2,
								max:5,
								message: 'Please select at least 2 and maximum 5 options'
							}
						}
					},

					memo: {
						validators: {
							notEmpty: {
								message: 'Please enter memo text'
							},
							stringLength: {
								min:50,
								max:100,
								message: 'Please enter a menu within text length range 50 and 100'
							}
						}
					},

					checkbox: {
						validators: {
							choice: {
								min:1,
								message: 'Please kindly check this'
							}
						}
					},

					checkboxes: {
						validators: {
							choice: {
								min:2,
								max:5,
								message: 'Please check at least 1 and maximum 2 options'
							}
						}
					},

					radios: {
						validators: {
							choice: {
								min:1,
								message: 'Please kindly check this'
							}
						}
					},
				},

				plugins: { //Learn more: https://formvalidation.io/guide/plugins
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap(),
					// Validate fields when clicking the Submit button
					submitButton: new FormValidation.plugins.SubmitButton(),
            		// Submit the form when all fields are valid
            		defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
				}
			}
		);
	}

	var _initDemo2 = function () {
		FormValidation.formValidation(
			document.getElementById('kt_form_2'),
			{
				fields: {
					billing_card_name: {
						validators: {
							notEmpty: {
								message: 'Card Holder Name is required'
							}
						}
					},
					billing_card_number: {
						validators: {
							notEmpty: {
								message: 'Credit card number is required'
							},
							creditCard: {
								message: 'The credit card number is not valid'
							}
						}
					},
					billing_card_exp_month: {
						validators: {
							notEmpty: {
								message: 'Expiry Month is required'
							}
						}
					},
					billing_card_exp_year: {
						validators: {
							notEmpty: {
								message: 'Expiry Year is required'
							}
						}
					},
					billing_card_cvv: {
						validators: {
							notEmpty: {
								message: 'CVV is required'
							},
							digits: {
								message: 'The CVV velue is not a valid digits'
							}
						}
					},

					billing_address_1: {
						validators: {
							notEmpty: {
								message: 'Address 1 is required'
							}
						}
					},
					billing_city: {
						validators: {
							notEmpty: {
								message: 'City 1 is required'
							}
						}
					},
					billing_state: {
						validators: {
							notEmpty: {
								message: 'State 1 is required'
							}
						}
					},
					billing_zip: {
						validators: {
							notEmpty: {
								message: 'Zip Code is required'
							},
							zipCode: {
								country: 'US',
								message: 'The Zip Code value is invalid'
							}
						}
					},

					billing_delivery: {
						validators: {
							choice: {
								min:1,
								message: 'Please kindly select delivery type'
							}
						}
					},
					package: {
						validators: {
							choice: {
								min:1,
								message: 'Please kindly select package type'
							}
						}
					}
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Validate fields when clicking the Submit button
					submitButton: new FormValidation.plugins.SubmitButton(),
            		// Submit the form when all fields are valid
            		defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		);
	}

	return {
		// public functions
		init: function() {
			_initDemo1();
			_initDemo2();
		}
	};
}();

jQuery(document).ready(function() {
	KTFormControls.init();
});
