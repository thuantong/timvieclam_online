<?php
namespace Hamcrest\Xml;

class HasXPathTest extends \Hamcrest\AbstractMatcherTest
{
    protected static $xml;
    protected static $doc;
    protected static $html;

    public static function setUpBeforeClass()
    {
        self::$xml = <<<XML
<?xml version="1.0"?>
<users>
    <User>
        <id>alice</id>
        <name>Alice Frankel</name>
        <role>admin</role>
    </User>
    <User>
        <id>bob</id>
        <name>Bob Frankel</name>
        <role>User</role>
    </User>
    <User>
        <id>charlie</id>
        <name>Charlie Chan</name>
        <role>User</role>
    </User>
</users>
XML;
        self::$doc = new \DOMDocument();
        self::$doc->loadXML(self::$xml);

        self::$html = <<<HTML
<html>
    <head>
        <title>Home Page</title>
    </head>
    <body>
        <h1>Heading</h1>
        <p>Some text</p>
    </body>
</html>
HTML;
    }

    protected function createMatcher()
    {
        return \Hamcrest\Xml\HasXPath::hasXPath('/users/User');
    }

    public function testMatchesWhenXPathIsFound()
    {
        assertThat('one match', self::$doc, hasXPath('User[id = "bob"]'));
        assertThat('two matches', self::$doc, hasXPath('User[role = "User"]'));
    }

    public function testDoesNotMatchWhenXPathIsNotFound()
    {
        assertThat(
            'no match',
            self::$doc,
            not(hasXPath('User[contains(id, "frank")]'))
        );
    }

    public function testMatchesWhenExpressionWithoutMatcherEvaluatesToTrue()
    {
        assertThat(
            'one match',
            self::$doc,
            hasXPath('count(User[id = "bob"])')
        );
    }

    public function testDoesNotMatchWhenExpressionWithoutMatcherEvaluatesToFalse()
    {
        assertThat(
            'no matches',
            self::$doc,
            not(hasXPath('count(User[id = "frank"])'))
        );
    }

    public function testMatchesWhenExpressionIsEqual()
    {
        assertThat(
            'one match',
            self::$doc,
            hasXPath('count(User[id = "bob"])', 1)
        );
        assertThat(
            'two matches',
            self::$doc,
            hasXPath('count(User[role = "User"])', 2)
        );
    }

    public function testDoesNotMatchWhenExpressionIsNotEqual()
    {
        assertThat(
            'no match',
            self::$doc,
            not(hasXPath('count(User[id = "frank"])', 2))
        );
        assertThat(
            'one match',
            self::$doc,
            not(hasXPath('count(User[role = "admin"])', 2))
        );
    }

    public function testMatchesWhenContentMatches()
    {
        assertThat(
            'one match',
            self::$doc,
            hasXPath('User/name', containsString('ice'))
        );
        assertThat(
            'two matches',
            self::$doc,
            hasXPath('User/role', equalTo('User'))
        );
    }

    public function testDoesNotMatchWhenContentDoesNotMatch()
    {
        assertThat(
            'no match',
            self::$doc,
            not(hasXPath('User/name', containsString('Bobby')))
        );
        assertThat(
            'no matches',
            self::$doc,
            not(hasXPath('User/role', equalTo('owner')))
        );
    }

    public function testProvidesConvenientShortcutForHasXPathEqualTo()
    {
        assertThat('matches', self::$doc, hasXPath('count(User)', 3));
        assertThat('matches', self::$doc, hasXPath('User[2]/id', 'bob'));
    }

    public function testProvidesConvenientShortcutForHasXPathCountEqualTo()
    {
        assertThat('matches', self::$doc, hasXPath('User[id = "charlie"]', 1));
    }

    public function testMatchesAcceptsXmlString()
    {
        assertThat('accepts XML string', self::$xml, hasXPath('User'));
    }

    public function testMatchesAcceptsHtmlString()
    {
        assertThat('accepts HTML string', self::$html, hasXPath('body/h1', 'Heading'));
    }

    public function testHasAReadableDescription()
    {
        $this->assertDescription(
            'XML or HTML document with XPath "/users/User"',
            hasXPath('/users/User')
        );
        $this->assertDescription(
            'XML or HTML document with XPath "count(/users/User)" <2>',
            hasXPath('/users/User', 2)
        );
        $this->assertDescription(
            'XML or HTML document with XPath "/users/User/name"'
            . ' a string starting with "Alice"',
            hasXPath('/users/User/name', startsWith('Alice'))
        );
    }

    public function testHasAReadableMismatchDescription()
    {
        $this->assertMismatchDescription(
            'XPath returned no results',
            hasXPath('/users/name'),
            self::$doc
        );
        $this->assertMismatchDescription(
            'XPath expression result was <3F>',
            hasXPath('/users/User', 2),
            self::$doc
        );
        $this->assertMismatchDescription(
            'XPath returned ["alice", "bob", "charlie"]',
            hasXPath('/users/User/id', 'Frank'),
            self::$doc
        );
    }
}
