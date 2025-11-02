<?php
/*

Design Patterns in PHP (Factory, Singleton, Strategy)
These patterns help write flexible, maintainable, 
and reusable code in real-life scenarios.

Factory → Creates objects without specifying exact class.
Singleton → Ensures only one instance exists.
Strategy → Allows changing behavior dynamically.

*/


// FACTORY PATTERN
// ==========================================================
// → Helps create objects without exposing the creation logic.
// → Instead of writing "new Manager()" or "new Developer()" everywhere,
//   we ask the Factory to give us the right object automatically.
// Example: HR system creates Manager, Developer, or Intern without directly using 'new'.


// All employee types must follow this same structure
interface EmployeeInterface {
    public function getRole();
}

// Different Employee Types
class Manager implements EmployeeInterface {
    public function getRole() {
        return "Manager";
    }
}

class Developer implements EmployeeInterface {
    public function getRole() {
        return "Developer";
    }
}

class Intern implements EmployeeInterface {
    public function getRole() {
        return "Intern";
    }
}

// Factory decides which employee object to create
class EmployeeFactory {

    // Static method to create objects based on input type
    public static function create($type) {
        switch (strtolower($type)) {
            case 'manager': 
                return new Manager();   // If type = manager → create Manager object
            case 'developer': 
                return new Developer(); // If type = developer → create Developer object
            case 'intern': 
                return new Intern();    // If type = intern → create Intern object
            default:
                throw new Exception("Invalid employee type"); // Handle wrong input
        }
    }
}

// HR system creates employees dynamically based on their type
$emp1 = EmployeeFactory::create("manager");   // Creates Manager object
$emp2 = EmployeeFactory::create("developer"); // Creates Developer object

echo "Factory Example: Employee 1 Role: " . $emp1->getRole() . "\n"; // Output: Manager
echo "Factory Example: Employee 2 Role: " . $emp2->getRole() . "\n"; // Output: Developer

/*
Explanation:
- `EmployeeInterface` → sets a rule that all employees must have getRole().
- Classes like Manager, Developer, Intern → follow that rule.
- `EmployeeFactory` → decides which class to create using the given type.
- Instead of using "new Manager()" or "new Developer()" everywhere, we just call EmployeeFactory::create("manager").

Why it’s useful:
- Centralized control for object creation.
- Adding new employee types (like "Designer") is easy → just make a new class and update the factory.
- Keeps code clean and organized.

Real-Life Analogy:
- Like an HR department: You don’t directly hire (create) employees yourself.
  You just tell HR: “I need a Developer,” and HR gives you the right one.
*/


// SINGLETON PATTERN
// ==========================================================
// → Ensures only ONE instance of a class exists in the entire program.
// → Example: You only need one HR system or one database connection.

class HRSystem {
    private static $instance = null;
    public $systemName;

    // Private constructor → prevents creating object directly using "new"
    private function __construct() {
        $this->systemName = "Company HR System";
    }

    // Static method that controls access to the single instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new HRSystem();
        }
        return self::$instance; // Return the same instance every time
    }

    public function showSystemName() {
        echo "Singleton Example: " . $this->systemName . "\n";
    }
}

// We don’t use “new HRSystem()” directly, instead use getInstance()
$hr1 = HRSystem::getInstance(); // First call creates a new instance
$hr2 = HRSystem::getInstance(); // Second call reuses the same instance

// Show HR system name
$hr1->showSystemName(); // Output: Singleton Example: Company HR System

// Check if both variables point to the same object
if ($hr1 === $hr2) {
    echo "Singleton Example: Both instances are same\n"; 
    // Output: Singleton Example: Both instances are same
}

/*
Explanation:
- `private static $instance` → holds the one and only object.
- `private function __construct()` → blocks direct object creation.
- `getInstance()` → checks if an instance exists, if not → creates it.
- Every time you call `getInstance()` → you get the same object.

Why it’s useful:
- Prevents duplicate connections or configurations.
- Central control → only one HR system or one database across your app.

Real-Life Analogy:
- Like a company CEO — there can be only one person in that position.
- Everyone refers to the same CEO, not different ones.
*/


// STRATEGY PATTERN
// ==========================================================
// → Change behavior dynamically (e.g., calculate salary with different bonus strategies)

// Strategy Interface
interface BonusStrategy {
    public function calculate($salary);
}

// Fixed bonus strategy
class FixedBonusStrategy implements BonusStrategy {
    public function calculate($salary) {
        return $salary + 5000;
    }
}

// Percentage bonus strategy
class PercentageBonusStrategy implements BonusStrategy {
    public function calculate($salary) {
        return $salary + ($salary * 0.10);
    }
}

// Employee context using a strategy
class EmployeeWithBonus {
    public $name;
    public $salary;
    private $bonusStrategy;

    // Constructor takes employee details and a bonus strategy
    public function __construct($name, $salary, BonusStrategy $strategy) {
        $this->name = $name;            // Set employee name
        $this->salary = $salary;        // Set base salary
        $this->bonusStrategy = $strategy; // Store which strategy to use
    }

    public function getTotalSalary() {
        return $this->bonusStrategy->calculate($this->salary); // Calculate total salary using the strategy
    }

    public function setBonusStrategy(BonusStrategy $strategy) {
        $this->bonusStrategy = $strategy; // Replace current strategy with a new one
    }
}

// Create an employee “Rahim” with 40,000 base salary and Use FixedBonusStrategy → adds 5000 BDT
$emp = new EmployeeWithBonus("Rahim", 40000, new FixedBonusStrategy());
echo "Strategy Example (Fixed): {$emp->name}'s total salary: " . $emp->getTotalSalary() . " BDT\n";
// Output: Strategy Example (Fixed): Rahim's total salary: 45000 BDT


// Change bonus strategy at runtime → now use percentage-based bonus
$emp->setBonusStrategy(new PercentageBonusStrategy());
echo "Strategy Example (Percentage): {$emp->name}'s total salary: " . $emp->getTotalSalary() . " BDT\n";
// Output: Strategy Example (Percentage): Rahim's total salary: 44000 BDT

/*

Explanation:
- We have one interface (BonusStrategy) → defines a rule.
- Two concrete classes (FixedBonusStrategy, PercentageBonusStrategy) → define different bonus logics.
- EmployeeWithBonus doesn’t know how the bonus is calculated.
- It just uses whichever “strategy” you give it.

Why it’s useful:
- You can add new bonus types (like FestivalBonus, PerformanceBonus) easily.
- You can switch logic at runtime without touching employee code.
- Makes the system flexible, clean, and easy to maintain.

Real-Life Analogy:
- Like choosing a payment method at checkout (Credit Card, PayPal, Cash).
- The cart doesn’t change - only the payment strategy changes the behavior.

*/


/*

Factory Pattern → Creates objects dynamically
Example 1: HR system creates Manager, Developer, or Intern without directly using 'new'.
Example 2: Online store creates Product objects like Book, Electronics, or Clothing dynamically based on category.

Singleton Pattern → Only one instance exists
Example 1: HRSystem settings or database connection shared across the app.
Example 2: Logger system to record errors → ensures only one logger instance writes logs consistently.

Strategy Pattern → Allows dynamic behavior changes
Example 1: Employee salary bonus calculation → can switch between FixedBonus and PercentageBonus dynamically.
Example 2: Payment system → user can choose between CreditCardPayment, PayPalPayment, or BankTransferPayment at runtime.
*/


?>
