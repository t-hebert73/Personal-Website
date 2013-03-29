<?php
	/**
	*	File : Error.php
	*	Last Motified : Feb 20, 2012
	*	Description : Error class definition, used for error checking.
	*				  Requires sessions to work
	*/
	class Error
	{
		// Member variables
		private $error;
		//private $param;
		
		// Constructor
		// Initializes an error
		// e - A string representing the error
		public function __construct($e)
		{
			// Set the error
			$this->error = $e;
		}
		
		// Returns the error code
		public function getError()
		{
			// Return the error
			return $this->error;
		}
		
		// Returns the paremeter
		// TODO
		// public function getParam();
		
		// Throws an error
		// This function sets an error for the next page to catch
		// Note : The errors will remain in the sessions until catched.
		public function _throw()
		{
			// Set the session for the error
			$_SESSION['error'] = serialize($this);
		}
		
		// Static catch function
		// Retrieves any errors from the sessions
		public static function _catch()
		{
			// Check to see if there are any errors
			if( isset($_SESSION['error']) )
			{
				// Get the error
				$e = unserialize($_SESSION['error']);
				
				// Delete the session
				unset($_SESSION['error']);
				
				// Return the error
				return $e;
			}
			
			// No errors found
			return null;
		}
	}