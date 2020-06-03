<?php

namespace Busybrain\Matrix\Validation;

use Busybrain\Matrix\Contracts\ValidatorInterface;
use Busybrain\Matrix\Exceptions\ValidationException;
use Busybrain\Matrix\Matrix;
use Busybrain\Matrix\Validation\OperationValidator;
use Busybrain\Matrix\Validation\ValidationAttributes;
use Busybrain\Matrix\Validation\ValidationParser;
use Closure;

class Validator 
{
	use ValidationAttributes;
	use OperationValidator;

	/**
	 * the valid string validation rules
	 */
	protected const Validatable = [
		'dim',
		'singular',
		'square'
	];

	/**
	 * returns the validation message 
	 * @var array
	 */
	protected $message = [];

	/**
	 * validate with rules
	 * @param  Matrix $matrix  
	 * @param  array  $rules   
	 * @return bool         
	 */
	public function validate(Matrix $matrix, array $rules) : bool
	{
		$status = [];

		foreach ($rules as $key => $rule) {
			 
			[$command , $args] = ValidationParser::parse($rule);

			$status[] = $state = $this->runValidation($matrix,$command,$args);
			
			if (!$state && !is_callable($rule)) {
				$this->addMessage($rule);
			}
		}

		 return (!in_array(false,$status));
		
	}

	/**
	 * validates and returns the validation message if failure occurs
	 * @param  Matrix $matrix  
	 * @param  array  $rules   
	 * @return array          
	 */
	public function validateWithMessage(Matrix $matrix,array $rules) : array
	{
		$state = $this->validate($matrix,$rules);
		return ($state) ? [] : $this->getMessage();

	}

	/**
	 * retruns the validation error messages
	 * @return array
	 */
	protected function getMessage() : array
	{
		return $this->message;
	}

	/**
	 * match attribute to value
	 * @param  Matrix $matrix  
	 * @param  string $command 
	 * @param  array $args    
	 * @return bool        
	 */
	protected function runValidation(Matrix $matrix,$command,$args) : bool
	{
		if (self::validatable($command)) {
			return $this->processCommand($matrix,$command,$args);
		}
		elseif (is_callable($command)) {
			 
			return $this->processClosureCommands($command,$matrix);
		}


		throw new ValidationException('invalid  rule given. you gave rule'.$command.' which is mot currently supported');
	}

	/**
	 * process the closure based validation
	 * @param  Closure $command  
	 * @param  Matrix  $matrix   
	 * @return bool           
	 */
	protected function processClosureCommands(Closure $command,Matrix $matrix) : bool
	{
		return $command->__invoke($matrix,function($message){

				$this->message[] = $message;
				return false;
		});

		
	}

	
	/**
	 * runs the string commands
	 * @param  Matrix $matrix 
	 * @param  String $command  
	 * @param  array  $args     
	 * @return bool         
	 */
	protected function processCommand(Matrix  $matrix,$command,array $args) : bool
	{
		$command = 'Validate'.ucfirst($command);

		$arg = array_merge([$matrix],$args);
		
		return $this->$command(...$arg);
	}

	/**
	 * checks if the command is valid
	 * @param  String $command 
	 * @return bool          
	 */
	protected static function validatable($command) : bool
	{
		return in_array($command, self::Validatable);

	}
	/**
	 * adds new validation message to the message stack
	 * @param String $command 
	 *
	 * @return void
	 */
	protected function addMessage($command) : void
	{
		$this->message[] = "the matrix failed $command validation"; 
	}

 

	
}
