<?php

namespace Blog\Models\Base;

use \Exception;
use \PDO;
use Blog\Models\Posts as ChildPosts;
use Blog\Models\PostsQuery as ChildPostsQuery;
use Blog\Models\Map\PostsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'posts' table.
 *
 *
 *
 * @method     ChildPostsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPostsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildPostsQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ChildPostsQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 *
 * @method     ChildPostsQuery groupById() Group by the id column
 * @method     ChildPostsQuery groupByTitle() Group by the title column
 * @method     ChildPostsQuery groupByActive() Group by the active column
 * @method     ChildPostsQuery groupByUserId() Group by the user_id column
 *
 * @method     ChildPostsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPostsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPostsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPostsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPostsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPostsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPostsQuery leftJoinPostsContentRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostsContentRelatedById relation
 * @method     ChildPostsQuery rightJoinPostsContentRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostsContentRelatedById relation
 * @method     ChildPostsQuery innerJoinPostsContentRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the PostsContentRelatedById relation
 *
 * @method     ChildPostsQuery joinWithPostsContentRelatedById($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PostsContentRelatedById relation
 *
 * @method     ChildPostsQuery leftJoinWithPostsContentRelatedById() Adds a LEFT JOIN clause and with to the query using the PostsContentRelatedById relation
 * @method     ChildPostsQuery rightJoinWithPostsContentRelatedById() Adds a RIGHT JOIN clause and with to the query using the PostsContentRelatedById relation
 * @method     ChildPostsQuery innerJoinWithPostsContentRelatedById() Adds a INNER JOIN clause and with to the query using the PostsContentRelatedById relation
 *
 * @method     ChildPostsQuery leftJoinUsersRelatedByUserId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsersRelatedByUserId relation
 * @method     ChildPostsQuery rightJoinUsersRelatedByUserId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsersRelatedByUserId relation
 * @method     ChildPostsQuery innerJoinUsersRelatedByUserId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsersRelatedByUserId relation
 *
 * @method     ChildPostsQuery joinWithUsersRelatedByUserId($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UsersRelatedByUserId relation
 *
 * @method     ChildPostsQuery leftJoinWithUsersRelatedByUserId() Adds a LEFT JOIN clause and with to the query using the UsersRelatedByUserId relation
 * @method     ChildPostsQuery rightJoinWithUsersRelatedByUserId() Adds a RIGHT JOIN clause and with to the query using the UsersRelatedByUserId relation
 * @method     ChildPostsQuery innerJoinWithUsersRelatedByUserId() Adds a INNER JOIN clause and with to the query using the UsersRelatedByUserId relation
 *
 * @method     ChildPostsQuery leftJoinPostsContentRelatedByPostsId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostsContentRelatedByPostsId relation
 * @method     ChildPostsQuery rightJoinPostsContentRelatedByPostsId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostsContentRelatedByPostsId relation
 * @method     ChildPostsQuery innerJoinPostsContentRelatedByPostsId($relationAlias = null) Adds a INNER JOIN clause to the query using the PostsContentRelatedByPostsId relation
 *
 * @method     ChildPostsQuery joinWithPostsContentRelatedByPostsId($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PostsContentRelatedByPostsId relation
 *
 * @method     ChildPostsQuery leftJoinWithPostsContentRelatedByPostsId() Adds a LEFT JOIN clause and with to the query using the PostsContentRelatedByPostsId relation
 * @method     ChildPostsQuery rightJoinWithPostsContentRelatedByPostsId() Adds a RIGHT JOIN clause and with to the query using the PostsContentRelatedByPostsId relation
 * @method     ChildPostsQuery innerJoinWithPostsContentRelatedByPostsId() Adds a INNER JOIN clause and with to the query using the PostsContentRelatedByPostsId relation
 *
 * @method     ChildPostsQuery leftJoinUsersRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsersRelatedById relation
 * @method     ChildPostsQuery rightJoinUsersRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsersRelatedById relation
 * @method     ChildPostsQuery innerJoinUsersRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the UsersRelatedById relation
 *
 * @method     ChildPostsQuery joinWithUsersRelatedById($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UsersRelatedById relation
 *
 * @method     ChildPostsQuery leftJoinWithUsersRelatedById() Adds a LEFT JOIN clause and with to the query using the UsersRelatedById relation
 * @method     ChildPostsQuery rightJoinWithUsersRelatedById() Adds a RIGHT JOIN clause and with to the query using the UsersRelatedById relation
 * @method     ChildPostsQuery innerJoinWithUsersRelatedById() Adds a INNER JOIN clause and with to the query using the UsersRelatedById relation
 *
 * @method     \Blog\Models\PostsContentQuery|\Blog\Models\UsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPosts findOne(ConnectionInterface $con = null) Return the first ChildPosts matching the query
 * @method     ChildPosts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPosts matching the query, or a new ChildPosts object populated from the query conditions when no match is found
 *
 * @method     ChildPosts findOneById(int $id) Return the first ChildPosts filtered by the id column
 * @method     ChildPosts findOneByTitle(string $title) Return the first ChildPosts filtered by the title column
 * @method     ChildPosts findOneByActive(boolean $active) Return the first ChildPosts filtered by the active column
 * @method     ChildPosts findOneByUserId(int $user_id) Return the first ChildPosts filtered by the user_id column *

 * @method     ChildPosts requirePk($key, ConnectionInterface $con = null) Return the ChildPosts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPosts requireOne(ConnectionInterface $con = null) Return the first ChildPosts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPosts requireOneById(int $id) Return the first ChildPosts filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPosts requireOneByTitle(string $title) Return the first ChildPosts filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPosts requireOneByActive(boolean $active) Return the first ChildPosts filtered by the active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPosts requireOneByUserId(int $user_id) Return the first ChildPosts filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPosts[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPosts objects based on current ModelCriteria
 * @method     ChildPosts[]|ObjectCollection findById(int $id) Return ChildPosts objects filtered by the id column
 * @method     ChildPosts[]|ObjectCollection findByTitle(string $title) Return ChildPosts objects filtered by the title column
 * @method     ChildPosts[]|ObjectCollection findByActive(boolean $active) Return ChildPosts objects filtered by the active column
 * @method     ChildPosts[]|ObjectCollection findByUserId(int $user_id) Return ChildPosts objects filtered by the user_id column
 * @method     ChildPosts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PostsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Blog\Models\Base\PostsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Blog\\Models\\Posts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPostsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPostsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPostsQuery) {
            return $criteria;
        }
        $query = new ChildPostsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPosts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PostsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PostsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPosts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, title, active, user_id FROM posts WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPosts $obj */
            $obj = new ChildPosts();
            $obj->hydrate($row);
            PostsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPosts|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PostsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PostsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @see       filterByPostsContentRelatedById()
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PostsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PostsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the active column
     *
     * Example usage:
     * <code>
     * $query->filterByActive(true); // WHERE active = true
     * $query->filterByActive('yes'); // WHERE active = true
     * </code>
     *
     * @param     boolean|string $active The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByActive($active = null, $comparison = null)
    {
        if (is_string($active)) {
            $active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PostsTableMap::COL_ACTIVE, $active, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterByUsersRelatedByUserId()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(PostsTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(PostsTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query by a related \Blog\Models\PostsContent object
     *
     * @param \Blog\Models\PostsContent|ObjectCollection $postsContent The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPostsQuery The current query, for fluid interface
     */
    public function filterByPostsContentRelatedById($postsContent, $comparison = null)
    {
        if ($postsContent instanceof \Blog\Models\PostsContent) {
            return $this
                ->addUsingAlias(PostsTableMap::COL_ID, $postsContent->getId(), $comparison);
        } elseif ($postsContent instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PostsTableMap::COL_ID, $postsContent->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPostsContentRelatedById() only accepts arguments of type \Blog\Models\PostsContent or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PostsContentRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function joinPostsContentRelatedById($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PostsContentRelatedById');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PostsContentRelatedById');
        }

        return $this;
    }

    /**
     * Use the PostsContentRelatedById relation PostsContent object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Blog\Models\PostsContentQuery A secondary query class using the current class as primary query
     */
    public function usePostsContentRelatedByIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPostsContentRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PostsContentRelatedById', '\Blog\Models\PostsContentQuery');
    }

    /**
     * Filter the query by a related \Blog\Models\Users object
     *
     * @param \Blog\Models\Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPostsQuery The current query, for fluid interface
     */
    public function filterByUsersRelatedByUserId($users, $comparison = null)
    {
        if ($users instanceof \Blog\Models\Users) {
            return $this
                ->addUsingAlias(PostsTableMap::COL_USER_ID, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PostsTableMap::COL_USER_ID, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsersRelatedByUserId() only accepts arguments of type \Blog\Models\Users or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsersRelatedByUserId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function joinUsersRelatedByUserId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsersRelatedByUserId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UsersRelatedByUserId');
        }

        return $this;
    }

    /**
     * Use the UsersRelatedByUserId relation Users object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Blog\Models\UsersQuery A secondary query class using the current class as primary query
     */
    public function useUsersRelatedByUserIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsersRelatedByUserId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsersRelatedByUserId', '\Blog\Models\UsersQuery');
    }

    /**
     * Filter the query by a related \Blog\Models\PostsContent object
     *
     * @param \Blog\Models\PostsContent|ObjectCollection $postsContent the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPostsQuery The current query, for fluid interface
     */
    public function filterByPostsContentRelatedByPostsId($postsContent, $comparison = null)
    {
        if ($postsContent instanceof \Blog\Models\PostsContent) {
            return $this
                ->addUsingAlias(PostsTableMap::COL_ID, $postsContent->getPostsId(), $comparison);
        } elseif ($postsContent instanceof ObjectCollection) {
            return $this
                ->usePostsContentRelatedByPostsIdQuery()
                ->filterByPrimaryKeys($postsContent->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPostsContentRelatedByPostsId() only accepts arguments of type \Blog\Models\PostsContent or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PostsContentRelatedByPostsId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function joinPostsContentRelatedByPostsId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PostsContentRelatedByPostsId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PostsContentRelatedByPostsId');
        }

        return $this;
    }

    /**
     * Use the PostsContentRelatedByPostsId relation PostsContent object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Blog\Models\PostsContentQuery A secondary query class using the current class as primary query
     */
    public function usePostsContentRelatedByPostsIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPostsContentRelatedByPostsId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PostsContentRelatedByPostsId', '\Blog\Models\PostsContentQuery');
    }

    /**
     * Filter the query by a related \Blog\Models\Users object
     *
     * @param \Blog\Models\Users|ObjectCollection $users the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPostsQuery The current query, for fluid interface
     */
    public function filterByUsersRelatedById($users, $comparison = null)
    {
        if ($users instanceof \Blog\Models\Users) {
            return $this
                ->addUsingAlias(PostsTableMap::COL_ID, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            return $this
                ->useUsersRelatedByIdQuery()
                ->filterByPrimaryKeys($users->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsersRelatedById() only accepts arguments of type \Blog\Models\Users or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsersRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function joinUsersRelatedById($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsersRelatedById');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UsersRelatedById');
        }

        return $this;
    }

    /**
     * Use the UsersRelatedById relation Users object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Blog\Models\UsersQuery A secondary query class using the current class as primary query
     */
    public function useUsersRelatedByIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsersRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsersRelatedById', '\Blog\Models\UsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPosts $posts Object to remove from the list of results
     *
     * @return $this|ChildPostsQuery The current query, for fluid interface
     */
    public function prune($posts = null)
    {
        if ($posts) {
            $this->addUsingAlias(PostsTableMap::COL_ID, $posts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the posts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PostsTableMap::clearInstancePool();
            PostsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PostsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PostsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PostsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PostsQuery
