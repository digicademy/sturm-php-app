<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:tei="http://www.tei-c.org/ns/1.0"
                xmlns:xs="http://www.w3.org/2001/XMLSchema"
                xmlns:exslt="http://exslt.org/common"
                xmlns:php="http://php.net/xsl"
                exclude-result-prefixes="xs tei exslt php"
                version="1.0">

    <xsl:output method="html" encoding="UTF-8" indent="yes" xml:space="preserve" omit-xml-declaration="yes" />

    <!-- identity transform: copy source nodes to target document -->
    <xsl:template match="@* | node()">
        <xsl:copy>
            <xsl:apply-templates select="@* | node()"/>
        </xsl:copy>
    </xsl:template>

    <!-- headings -->
    <xsl:template match="ab[@rend]">
        <xsl:choose>
            <xsl:when test="@rend = 'h1'">
                <h1>
                    <xsl:apply-templates select="node()"/>
                </h1>
            </xsl:when>
            <xsl:when test="@rend = 'h2'">
                <h2>
                    <xsl:apply-templates select="node()"/>
                </h2>
            </xsl:when>
            <xsl:when test="@rend = 'h3'">
                <h3>
                    <xsl:apply-templates select="node()"/>
                </h3>
            </xsl:when>
            <xsl:when test="@rend = 'h4'">
                <h4>
                    <xsl:apply-templates select="node()"/>
                </h4>
            </xsl:when>
            <xsl:when test="@rend = 'h5'">
                <h5>
                    <xsl:apply-templates select="node()"/>
                </h5>
            </xsl:when>
            <xsl:when test="@rend = 'h6'">
                <h6>
                    <xsl:apply-templates select="node()"/>
                </h6>
            </xsl:when>
        </xsl:choose>
    </xsl:template>

    <!-- links -->
    <xsl:template match="ref">
        <xsl:choose>
            <xsl:when test="php:function('substring', @target, 1, 4) = 'http'">
                <a class="external" href="{@target}">
                    <xsl:apply-templates select="node()"/>
                </a>
            </xsl:when>
            <xsl:otherwise>
                <a href="{php:function('str_replace', '.xml', '.html', @target)}">
                    <xsl:apply-templates select="node()"/>
                </a>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <!-- tables -->
    <xsl:template match="table">
        <table>
            <xsl:apply-templates select="node()"/>
        </table>
    </xsl:template>
    <xsl:template match="row">
        <tr>
            <xsl:apply-templates select="node()"/>
        </tr>
    </xsl:template>
    <xsl:template match="cell">
        <td>
            <xsl:apply-templates select="node()"/>
        </td>
    </xsl:template>

    <!-- images -->
    <xsl:template match="figure"/>

    <!-- linebreaks -->
    <xsl:template match="lb">
        <br/>
    </xsl:template>

    <!-- dates -->
    <xsl:template match="date">
        <time datetime="{@when}">
            <xsl:apply-templates select="node()"/>
        </time>
    </xsl:template>

    <!-- underlined text -->
    <xsl:template match="hi[@rend = 'underline']">
        <span class="underline">
            <xsl:apply-templates select="node()"/>
        </span>
    </xsl:template>

    <!-- twice underlined text-->
    <xsl:template match="hi[@rend = 'twice-underline']">
        <span class="twice-underline">
            <xsl:apply-templates select="node()"/>
        </span>
    </xsl:template>

    <!-- strike through text-->
    <xsl:template match="hi[@rend = 'line-through']">
        <del>
            <xsl:apply-templates select="node()"/>
        </del>
    </xsl:template>

    <!-- sup -->
    <xsl:template match="hi[@rend = 'super']">
        <sup class="sup">
            <xsl:apply-templates select="node()"/>
        </sup>
    </xsl:template>

    <!-- em -->
    <xsl:template match="emph[@rend = 'em']">
        <em>
            <xsl:apply-templates select="node()"/>
        </em>
    </xsl:template>

    <!-- strong -->
    <xsl:template match="emph[@rend = 'strong']">
        <strong>
            <xsl:apply-templates select="node()"/>
        </strong>
    </xsl:template>

    <!-- small caps -->
    <xsl:template match="emph[@rend = 'small-caps']">
        <span class="small-caps">
            <xsl:apply-templates select="node()"/>
        </span>
    </xsl:template>

    <!-- unclear -->
    <xsl:template match="unclear">
        <em class="unclear" title="Unsichere Lesung">
            <xsl:apply-templates select="node()"/>
        </em>
    </xsl:template>

    <!-- sic -->
    <xsl:template match="sic">
        <span class="sic">
            <xsl:apply-templates select="node()"/>
        </span>
    </xsl:template>

    <!-- foreign language -->
    <xsl:template match="foreign">
        <i class="foreign">
            <xsl:apply-templates select="node()"/>
        </i>
    </xsl:template>

    <!-- div -->
    <xsl:template match="div">
        <xsl:choose>
            <xsl:when test="@n">
                <div class="{@n}">
                    <xsl:apply-templates select="node()"/>
                </div>
            </xsl:when>
            <xsl:otherwise>
                <div>
                    <xsl:apply-templates select="node()"/>
                </div>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>

    <!-- suppress elements that will be called from structural template -->
    <xsl:template match="ab[@type = 'subNavigation']" />
    <xsl:template match="div[@type = 'address']" />
    <xsl:template match="opener" />
    <xsl:template match="closer"/>
    <xsl:template match="div[@type = 'attachment']" />
    <xsl:template match="postscript"/>
    <xsl:template match="div[@type = 'content']/pb[1]"/>

    <!-- letter structural template -->
    <xsl:template match="text">
            <xsl:if test="//div[@type = 'address']">
                <xsl:call-template name="address"/>
            </xsl:if>
            <xsl:if test="//opener">
                <xsl:call-template name="opener"/>
            </xsl:if>
            <xsl:call-template name="text"/>
            <xsl:if test="//closer">
                <xsl:call-template name="closer"/>
            </xsl:if>
            <xsl:if test="//div[@type = 'attachment']">
                <xsl:call-template name="attachment"/>
            </xsl:if>
            <xsl:if test="//postscript">
                <xsl:call-template name="postscript"/>
            </xsl:if>
            <xsl:if test="//note">
                <xsl:call-template name="apparatus"/>
            </xsl:if>
    </xsl:template>

    <!-- letter sender/recipient addresses -->
    <xsl:template name="address">
        <div class="address">
            <xsl:apply-templates select="//div[@type = 'address']/child::node()"/>
        </div>
    </xsl:template>

    <!-- letter opener -->
    <xsl:template name="opener">
        <div class="opener">
            <span id="pb-{//div[@type = 'content']/pb[1]/@xml:id}" class="pb">
                <a class="external" href="{//div[@type = 'content']/pb[1]/@facs}">
                    [<xsl:value-of select="//div[@type = 'content']/pb[1]/@n" />]
                </a>
            </span>
            <xsl:apply-templates select="//opener/child::node()"/>
        </div>
    </xsl:template>

    <xsl:template match="opener/dateline">
        <h6 class="date">
            <xsl:apply-templates select="node()"/>
        </h6>
    </xsl:template>

    <!-- letter text -->
    <xsl:template name="text">
        <div class="text">
            <xsl:apply-templates select="//div[@type = 'content']"/>
        </div>
    </xsl:template>

    <!-- letter closer -->
    <xsl:template name="closer">
        <div class="closer">
            <p>
                <xsl:apply-templates select="//closer/child::node()"/>
            </p>
        </div>
    </xsl:template>

    <!-- letter attachment -->
    <xsl:template name="attachment">
        <div class="attachment">
            <xsl:apply-templates select="//div[@type = 'attachment']/child::node()"/>
        </div>
    </xsl:template>

    <xsl:template match="div[@type = 'attachment']/div/head">
        <p>
            <strong>
                <xsl:apply-templates select="node()"/>
            </strong>
        </p>
    </xsl:template>

    <!-- letter postscript -->
    <xsl:template name="postscript">
        <div class="postscript">
            <xsl:apply-templates select="//postscript/child::node()"/>
        </div>
    </xsl:template>

    <!-- letter apparatus -->
    <xsl:template name="apparatus">
        <div class="apparatus">
            <ol class="footnotes">
                <xsl:for-each select="//note">
                    <li id="ap-{position()}">
                        <xsl:apply-templates select="child::node()"/>
                        <a href="#fn-{position()}"> » </a>
                    </li>
                </xsl:for-each>
            </ol>
        </div>
    </xsl:template>

    <!-- footnotes -->
    <xsl:template match="note">
        <xsl:variable name="count">
            <xsl:number level="any" count="note" from="text"/>
        </xsl:variable>
        <sup class="fn">
            <a href="#ap-{$count}" id="fn-{$count}">
                <xsl:value-of select="$count"/>
            </a>
        </sup>
    </xsl:template>

    <!-- pagebreak -->
    <xsl:template match="pb">
        <span id="pb-{@xml:id}" class="pb">
            <br/>
            <a class="external" href="{@facs}">[<xsl:value-of select="@n"/>]</a>
            <br/>
        </span>
    </xsl:template>

    <!-- link to person -->
    <xsl:template match="persName">
        <a class="person" href="%BASE_PATH%/personen.html#{@key}">
            <xsl:apply-templates select="node()"/>
        </a>
    </xsl:template>

    <!-- link to place -->
    <xsl:template match="placeName">
        <a class="place" href="%BASE_PATH%/orte.html#{@key}">
            <xsl:apply-templates select="node()"/>
        </a>
    </xsl:template>

    <!-- link to work -->
    <xsl:template match="term">
        <a class="{@type}" href="%BASE_PATH%/werke.html#{@key}">
            <xsl:apply-templates select="node()"/>
        </a>
    </xsl:template>

    <!-- dateline parapgraph in closer -->
    <xsl:template match="closer/child::dateline">
        <p>
            <xsl:apply-templates select="node()"/>
        </p>
    </xsl:template>

    <!-- signature -->
    <xsl:template match="signed">
        <span class="salute">
            <xsl:if test="//closer[text()]/signed">
                <br/>
            </xsl:if>
            <xsl:apply-templates select="node()"/>
        </span>
    </xsl:template>

    <!-- salute -->
    <xsl:template match="salute">
        <xsl:apply-templates select="node()"/>
    </xsl:template>

    <xsl:template match="opener/salute">
        <h5 class="salute">
            <xsl:apply-templates select="node()"/>
        </h5>
    </xsl:template>

    <!-- address -->
    <xsl:template match="ab[@type='sender']|ab[@type='recipient']">
        <xsl:apply-templates select="node()"/>
    </xsl:template>
    <xsl:template match="ab/address">
        <xsl:variable name="type">
            <xsl:choose>
                <xsl:when test="parent::ab[@type='sender']">
                    <xsl:text>sender</xsl:text>
                </xsl:when>
                <xsl:when test="parent::ab[@type='recipient']">
                    <xsl:text>recipient</xsl:text>
                </xsl:when>
                <xsl:otherwise>
                    <xsl:text>standard</xsl:text>
                </xsl:otherwise>
            </xsl:choose>
        </xsl:variable>
        <p class="address {$type}">
            <xsl:apply-templates select="node()"/>
        </p>
    </xsl:template>
    <xsl:template match="p/address">
            <xsl:choose>
                <xsl:when test="@rend='inline'">
                    <span class="address inline">
                        <xsl:apply-templates select="node()"/>
                    </span>
                </xsl:when>
                <xsl:otherwise>
                    <p class="address">
                        <xsl:apply-templates select="node()"/>
                    </p>
                </xsl:otherwise>
            </xsl:choose>
    </xsl:template>
    <xsl:template match="addrLine">
        <span class="addrLine">
            <xsl:apply-templates select="node()"/>
        </span>
    </xsl:template>

    <!-- editor -->
    <xsl:template match="editor">
        <xsl:value-of select="persName/forename"/><xsl:text> </xsl:text><xsl:value-of select="persName/surname"/>
    </xsl:template>

</xsl:stylesheet>