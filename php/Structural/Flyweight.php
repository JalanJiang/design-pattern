<?php
/*
 * @Description: Flyweight Pattern
 * @Version: v1.0
 * @Author: JalanJiang
 * @Date: 2020-12-02 10:30:53
 * @LastEditTime: 2020-12-02 10:45:52
 */
class TreeFactory
{
    public static $treeType;

    public static function getTreeType(string $name, string $color, string $texture)
    {
        $key = md5("{$name}_{$color}_{$texture}");
        if (isset(self::$treeType[$key])) {
            // exist
            return self::$treeType[$key];
        }
        // new tree type
        $newTreeType = new TreeType($name, $color, $texture);
        self::$treeType[$key] = $newTreeType;
        return $newTreeType;
    }
}

// Tree types: share
class TreeType
{
    private string $name;

    private string $color;

    private string $texture;

    public function __construct(string $name, string $color, string $texture)
    {
        $this->name = $name;
        $this->color = $color;
        $this->texture = $texture;   
    }

    public function getName()
    {
        return $this->name;
    }
}

// Tree contain tree type
class Tree
{
    private int $x;
    
    private int $y;

    // share
    private TreeType $treeType;

    public function __construct(string $x, string $y, TreeType $treeType)
    {
        $this->x = $x;
        $this->y = $y;
        $this->treeType = $treeType;
    }

    public function draw()
    {
        echo "Tree Name {$this->treeType->getName()} in ({$this->x}, {$this->y})\n";
    }
}

class Forest
{
    private $trees;

    public function plantTree(int $x, int $y, string $name, string $color, string $texture)
    {
        // share
        $treeType = TreeFactory::getTreeType($name, $color, $texture);
        $tree = new Tree($x, $y, $treeType);
        $this->trees[] = $tree;
    }

    public function draw()
    {
        foreach ($this->trees as $tree)
        {
            $tree->draw();
        }
    }
}

$forest = new Forest();
$forest->plantTree(1, 2, 'tree A', 'green', 'texture A');
$forest->plantTree(10, 2, 'tree B', 'green', 'texture B');
$forest->draw();
/* Output:
Tree Name tree A in (1, 2)
Tree Name tree B in (10, 2)
*/