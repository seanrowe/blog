<?php

namespace Blog\Models\Base;

use \Exception;
use \PDO;
use Blog\Models\PostsContent as ChildPostsContent;
use Blog\Models\PostsContentQuery as ChildPostsContentQuery;
use Blog\Models\Map\PostsContentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'posts_content' table.
 *
 *
 *
 * @method     ChildPostsContentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPostsContentQuery orderByPostsId($order = Criteria::ASC) Order by the posts_id column
 * @method     ChildPostsContentQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method     ChildPostsContentQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildPostsContentQuery groupById() Group by the id column
 * @method     ChildPostsContentQuery groupByPostsId() Group by the posts_id column
 * @method     ChildPostsContentQuery groupByText() Group by the text column
 * @method     ChildPostsContentQuery groupByStatus() Group by the status column
 *
 * @method     ChildPostsContentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPostsContentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPostsContentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPostsContentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPostsContentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPostsContentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPostsContentQuery leftJoinPostsRelatedByPostsId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostsRelatedByPostsId relation
 * @method     ChildPostsContentQuery rightJoinPostsRelatedByPostsId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostsRelatedByPostsId relation
 * @method     ChildPostsContentQuery innerJoinPostsRelatedByPostsId($relationAlias = null) Adds a INNER JOIN clause to the query using the PostsRelatedByPostsId relation
 *
 * @method     ChildPostsContentQuery joinWithPostsRelatedByPostsId($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PostsRelatedByPostsId relation
 *
 * @method     ChildPostsContentQuery leftJoinWithPostsRelatedByPostsId() Adds a LEFT JOIN clause and with to the query using the PostsRelatedByPostsId relation
 * @method     ChildPostsContentQuery rightJoinWithPostsRelatedByPostsId() Adds a RIGHT JOIN clause and with to the query using the PostsRelatedByPostsId relation
 * @method     ChildPostsContentQuery innerJoinWithPostsRelatedByPostsId() Adds a INNER JOIN clause and with to the query using the PostsRelatedByPostsId relation
 *
 * @method     ChildPostsContentQuery leftJoinPostsRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostsRelatedById relation
 * @method     ChildPostsContentQuery rightJoinPostsRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostsRelatedById relation
 * @method     ChildPostsContentQuery innerJoinPostsRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the PostsRelatedById relation
 *
 * @method     ChildPostsContentQuery joinWithPostsRelatedById($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PostsRelatedById relation
 *
 * @method     ChildPostsContentQuery leftJoinWithPostsRelatedById() Adds a LEFT JOIN clause and with to the query using the PostsRelatedById relation
 * @method     ChildPostsContentQuery rightJoinWithPostsRelatedById() Adds a RIGHT JOIN clause and with to the query using the PostsRelatedById relation
 * @method     ChildPostsContentQuery innerJoinWithPostsRelatedById() Adds a INNER JOIN clause and with to the query using the PostsRelatedById relation
 *
 * @method     \Blog\Models\PostsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPostsContent findOne(ConnectionInterface $con = null) Return the first ChildPostsContent matching the query
 * @method     ChildPostsContent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPostsContent matching the query, or a new ChildPostsContent object populated from the query conditions when no match is found
 *
 * @method     ChildPostsContent findOneById(int $id) Return the first ChildPostsContent filtered by the id column
 * @method     ChildPostsContent findOneByPostsId(int $posts_id) Return the first ChildPostsContent filtered by the posts_id column
 * @method     ChildPostsContent findOneByText(string $text) Return the first ChildPostsContent filtered by the text column
 * @method     ChildPostsContent findOneByStatus(string $status) Return the first ChildPostsContent filtered by the status column *

 * @method     ChildPostsContent requirePk($key, ConnectionInterface $con = null) Return the ChildPostsContent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPostsContent requireOne(ConnectionInterface $con = null) Return the first ChildPostsContent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPostsContent requireOneById(int $id) Return the first ChildPostsContent filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPostsContent requireOneByPostsId(int $posts_id) Return the first ChildPostsContent filtered by the posts_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPostsContent requireOneByText(string $text) Return the first ChildPostsContent filtered by the text column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPostsContent requireOneByStatus(string $status) Return the first ChildPostsContent filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPostsContent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPostsContent objects based on current ModelCriteria
 * @method     ChildPostsContent[]|ObjectCollection findById(int $id) Return ChildPostsContent objects filtered by the id column
 * @method     ChildPostsContent[]|ObjectCollection findByPostsId(int $posts_id) Return ChildPostsContent objects filtered by the posts_id column
 * @method     ChildPostsContent[]|ObjectCollection findByText(string $text) Return ChildPostsContent objects filtered by the text column
 * @method     ChildPostsContent[]|ObjectCollection findByStatus(string $status) Return ChildPostsContent objects filtered by the status column
 * @method     ChildPostsContent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PostsContentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Blog\Models\Base\PostsContentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Blog\\Models\\PostsContent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPostsContentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPostsContentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPostsContentQuery) {
            return $criteria;
        }
        $query = new ChildPostsContentQuery();
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
     * @return ChildPostsContent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PostsContentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PostsContentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPostsContent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, posts_id, text, status FROM posts_content WHERE id = :p0';
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
            /** @var ChildPostsContent $obj */
            $obj = new ChildPostsContent();
            $obj->hydrate($row);
            PostsContentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPostsContent|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPostsContentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PostsContentTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPostsContentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PostsContentTableMap::COL_ID, $keys, Criteria::IN);
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
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsContentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PostsContentTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PostsContentTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsContentTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the posts_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPostsId(1234); // WHERE posts_id = 1234
     * $query->filterByPostsId(array(12, 34)); // WHERE posts_id IN (12, 34)
     * $query->filterByPostsId(array('min' => 12)); // WHERE posts_id > 12
     * </code>
     *
     * @see       filterByPostsRelatedByPostsId()
     *
     * @param     mixed $postsId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsContentQuery The current query, for fluid interface
     */
    public function filterByPostsId($postsId = null, $comparison = null)
    {
        if (is_array($postsId)) {
            $useMinMax = false;
            if (isset($postsId['min'])) {
                $this->addUsingAlias(PostsContentTableMap::COL_POSTS_ID, $postsId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postsId['max'])) {
                $this->addUsingAlias(PostsContentTableMap::COL_POSTS_ID, $postsId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsContentTableMap::COL_POSTS_ID, $postsId, $comparison);
    }

    /**
     * Filter the query on the text column
     *
     * Example usage:
     * <code>
     * $query->filterByText('fooValue');   // WHERE text = 'fooValue'
     * $query->filterByText('%fooValue%', Criteria::LIKE); // WHERE text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $text The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsContentQuery The current query, for fluid interface
     */
    public function filterByText($text = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($text)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsContentTableMap::COL_TEXT, $text, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostsContentQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostsContentTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \Blog\Models\Posts object
     *
     * @param \Blog\Models\Posts|ObjectCollection $posts The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPostsContentQuery The current query, for fluid interface
     */
    public function filterByPostsRelatedByPostsId($posts, $comparison = null)
    {
        if ($posts instanceof \Blog\Models\Posts) {
            return $this
                ->addUsingAlias(PostsContentTableMap::COL_POSTS_ID, $posts->getId(), $comparison);
        } elseif ($posts instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PostsContentTableMap::COL_POSTS_ID, $posts->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPostsRelatedByPostsId() only accepts arguments of type \Blog\Models\Posts or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PostsRelatedByPostsId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPostsContentQuery The current query, for fluid interface
     */
    public function joinPostsRelatedByPostsId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PostsRelatedByPostsId');

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
            $this->addJoinObject($join, 'PostsRelatedByPostsId');
        }

        return $this;
    }

    /**
     * Use the PostsRelatedByPostsId relation Posts object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Blog\Models\PostsQuery A secondary query class using the current class as primary query
     */
    public function usePostsRelatedByPostsIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPostsRelatedByPostsId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PostsRelatedByPostsId', '\Blog\Models\PostsQuery');
    }

    /**
     * Filter the query by a related \Blog\Models\Posts object
     *
     * @param \Blog\Models\Posts|ObjectCollection $posts the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPostsContentQuery The current query, for fluid interface
     */
    public function filterByPostsRelatedById($posts, $comparison = null)
    {
        if ($posts instanceof \Blog\Models\Posts) {
            return $this
                ->addUsingAlias(PostsContentTableMap::COL_ID, $posts->getId(), $comparison);
        } elseif ($posts instanceof ObjectCollection) {
            return $this
                ->usePostsRelatedByIdQuery()
                ->filterByPrimaryKeys($posts->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPostsRelatedById() only accepts arguments of type \Blog\Models\Posts or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PostsRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPostsContentQuery The current query, for fluid interface
     */
    public function joinPostsRelatedById($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PostsRelatedById');

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
            $this->addJoinObject($join, 'PostsRelatedById');
        }

        return $this;
    }

    /**
     * Use the PostsRelatedById relation Posts object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Blog\Models\PostsQuery A secondary query class using the current class as primary query
     */
    public function usePostsRelatedByIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPostsRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PostsRelatedById', '\Blog\Models\PostsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPostsContent $postsContent Object to remove from the list of results
     *
     * @return $this|ChildPostsContentQuery The current query, for fluid interface
     */
    public function prune($postsContent = null)
    {
        if ($postsContent) {
            $this->addUsingAlias(PostsContentTableMap::COL_ID, $postsContent->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the posts_content table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostsContentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PostsContentTableMap::clearInstancePool();
            PostsContentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PostsContentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PostsContentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PostsContentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PostsContentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PostsContentQuery
